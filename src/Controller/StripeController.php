<?php
declare(strict_types=1);

namespace App\Controller;



use Cake\Event\EventInterface;
use Cake\Routing\Router;


class StripeController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['index']);

    }

    public function index()
    {
        // Retrieve cart data from request
        $cartJson = $this->request->getData('cart');

        // Check if cartJson is a non-empty string
        if (is_string($cartJson) && !empty($cartJson)) {
            // Decode the JSON string into a PHP array
            $cart = json_decode($cartJson, true);

            // Check if decoding was successful and $cart is an array
            if (json_last_error() === JSON_ERROR_NONE && is_array($cart) && !empty($cart)) {
                $stripeSecretKey = "sk_test_51PBxjlRqNIa1a7EbHvdvKNctCTh1U8D9irVAtp9VbXtkTruUz7sO4lrADA8z6flQAuc8zEBVewpyChgFntLbgo7A007GtF8q8X";
                $successUrl = Router::url(['controller' => 'Pages', 'action' => 'display', 'payment_success'], true);
                $cancelUrl = Router::url(['controller' => 'Pages', 'action' => 'display', 'faqs'], true);

                // Set Stripe API key
                \Stripe\Stripe::setApiKey($stripeSecretKey);

                // Initialize array to store line items data
                $lineItems = [];

                // Build line items array from cart data
                foreach ($cart as $item) {
                    $lineItems[] = [
                        'price_data' => [
                            'currency' => 'aud',
                            'unit_amount' => $item['price'] * 100, // Convert to cents
                            'product_data' => [
                                'name' => $item['name']
                            ],
                        ],
                        'quantity' => $item['quantity'],
                    ];
                }

                // Create Stripe checkout session with the prepared line items
                $checkoutSession = \Stripe\Checkout\Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => $lineItems,
                    'mode' => 'payment',
                    'success_url' => $successUrl,
                    'cancel_url' => $cancelUrl,
                ]);

                // Redirect to Stripe checkout
                return $this->redirect($checkoutSession->url);
            } else {
                // Handle invalid cart data
                $this->Flash->error(__('Your cart is empty or invalid.'));
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        } else {
            // Handle missing or invalid cart JSON
            $this->Flash->error(__('Cart data is missing or invalid.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
        }
    }





}
