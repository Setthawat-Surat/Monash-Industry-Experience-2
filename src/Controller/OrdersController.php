<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\CampaignsTable;
use App\Model\Table\ItemsTable;
use Cake\Event\EventInterface;
use Stripe\Webhook;
/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 *
 */
class OrdersController extends AppController
{
    /**
     * @var \App\Model\Table\ItemsTable $Items
     * @var \App\Model\Table\CampaignsTable $Campaign
     */

    private ItemsTable $Items;

    private CampaignsTable $Campaigns;

    public function initialize(): void
    {
        parent::initialize();
        $this->Items = $this->fetchTable('Items');
        $this->Campaigns = $this->fetchTable('Campaigns');
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['webhook','saveOrder']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Orders->find();
        $orders = $this->paginate($query);

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, contain: ['Items', 'ProductOrders']);
        $this->set(compact('order'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $this->set(compact('order'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $this->set(compact('order'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function webhook()
    {
        $this->autoRender = false;
        $this->request->allowMethod(['post']); // Only allow POST requests

        $endpoint_secret = 'whsec_9f888523fd5fbc00b50897efbb41d47c4d793a88b6015f061e561060fe32472b'; // Set your Stripe webhook secret here
        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];

        try {
            $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }

        if ($event['type'] == 'checkout.session.completed') {
            $session = $event['data']['object'];

            // Retrieve session ID
            $session_id = $session['id'];

            $stripe = new \Stripe\StripeClient('sk_test_51PBxjlRqNIa1a7EbHvdvKNctCTh1U8D9irVAtp9VbXtkTruUz7sO4lrADA8z6flQAuc8zEBVewpyChgFntLbgo7A007GtF8q8X');

            // Retrieve session with expanded line items
            try {
                $session_with_items = $stripe->checkout->sessions->retrieve(
                    $session_id,
                    ['expand' => ['line_items.data.price.product']]
                );


                // Access line items
                $line_items = $session_with_items->line_items->data;

                // Loop through line items to get name, quantity and match product ID
                $items_details = [];
                foreach ($line_items as $item) {
                    $items_details[] = [
                        'name' => $item->description,  // Item name
                        'quantity' => $item->quantity,  // Item quantity
                        'unit_amount' => $item->price->unit_amount / 100,
                        'currency' => $item->price->currency,
                        'product_id' => $item->price->product->metadata['product_id'],
                    ];
                }

                // Retrieve customer and payment details
                $customer_email = $session['customer_details']['email'];

                $customer_name = $session['customer_details']['name'];

                $this->saveOrder($customer_name, $customer_email, $items_details);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                // Handle error
                http_response_code(500);
                exit('Error retrieving session: ' . $e->getMessage());
            }
        }
    }


    public function saveOrder($customer_name, $customer_email, $items_details){

        $order = $this->Orders->newEmptyEntity();
        $items_details_string = json_encode($items_details);
        $orderData = [
            'customer_name' => $customer_name,
            'customer_contact_email' => $customer_email,
            'status' => '0',
            'date_purchase' => date('Y-m-d H:i:s'),
        ];

        $order = $this->Orders->patchEntity($order, $orderData);

        if ($this->Orders->save($order)) {
            // Order saved successfully
            $this->Flash->success(__('Order saved successfully.'));

            $order_id = $order->id;

            foreach ($items_details as $item) {
                $this->saveItem($item, $order_id);
            }



        } else {
            // Handle save error
            $this->Flash->error(__('Failed to save order.'));
        }

    }

    public function saveItem($item, $order_id)
    {
        $items = $this->Items->newEmptyEntity();

        $itemData = [
            'name' => $item['name'],
            'quantity' => $item['quantity'],
            'price' => $item['unit_amount'], // Use unit_amount instead of price
            'order_id' => $order_id,
            'design_draft_id' => (int)$item['product_id'], // Make sure this is valid
        ];

        // Patch entity and save the product
        $item = $this->Items->patchEntity($items, $itemData);

        if ($this->Items->save($item)) {
            // Product saved successfully
            $this->Flash->success(__('Product saved successfully.'));
        } else {
            // Handle save error
            $errors = $item->getErrors();
            foreach ($errors as $field => $fieldErrors) {
                foreach ($fieldErrors as $error) {
                    $this->Flash->error(__('Failed to save product: ' . $error));
                }
            }
        }
    }


    public function viewOrder()
    {
        // Create the query
        $uniqueProductsQuery = $this->Items->find()
            ->select([
                'ProductName' => 'Items.name',
                'Total' => $this->Items->find()->func()->sum('Items.quantity'),
                'CampaignName' => 'Campaigns.name',
                'SchoolName' => 'Schools.name',
                'BellyBand' => 'DesignDrafts.belly_band',
                'SchoolAddress' => 'Schools.address',
                'RepFirstName' => 'Schools.rep_first_name',
                'RepLastName' => 'Schools.rep_last_name',
                'RepEmail' => 'Schools.rep_email',
                'Price' => 'Items.price',
                'BankAccount' => 'Schools.bank_account_number',
                'BSB' => 'Schools.bsb',
            ])
            ->leftJoinWith('DesignDrafts.Campaigns.Schools')
            ->group([
                'Items.name',
                'Campaigns.name',
                'Schools.name',
                'DesignDrafts.belly_band',
                'Schools.address',
                'Schools.rep_first_name',
                'Schools.rep_last_name',
                'Schools.rep_email',
                'Items.price',
                'Schools.bank_account_number',
                'Schools.bsb'
            ]);

        // Execute the query and get the results
        $uniqueProducts = $uniqueProductsQuery->toArray();

        // Group products by school name
        $groupedProducts = [];
        foreach ($uniqueProducts as $product) {
            $groupedProducts[$product->SchoolName][] = $product;
        }

        // Set the results for the view
        $this->set(compact('groupedProducts'));
    }



    public function listOrder(){

        $userId = $this->Authentication->getIdentity()->get('id');

        // Fetch all campaigns for the school along with their design drafts
        $campaigns = $this->Campaigns->find()
            ->where(['Campaigns.school_id' => $userId])
            ->contain(['DesignDrafts']) // Include related design drafts
            ->all();

        // Pass the campaigns with design drafts to the view
        $this->set(compact('campaigns'));

    }

}

