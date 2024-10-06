<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DesignDraft $designDraft
 */

$this->setLayout('school_dashboard');
$campaignId = $this->request->getQuery('cID');
$designId = $this->request->getQuery('dID');

?>

<div class="container-fluid">
    <?= $this->Flash->render(); ?>

    <h2>Feedback for Final Design</h2>

    <div class="form-wrapper">
        <section id="registration-form">

            <?= $this->Form->create($designDraft, ['url' => ['action' => 'addFeedback']]) ?>

            <?= $this->Form->hidden('cID', ['value' => $campaignId]) ?>
            <?= $this->Form->hidden('dID', ['value' => $designId]) ?>

            <div class="form-group">
                <?= $this->Form->control('feedback', [
                    'label' => [
                        'text' => 'Please provide your feedback: <span class="required-asterisk">*</span>',
                        'escape' => false
                    ],
                    'type' => 'textarea',
                    'id' => 'feedback',
                    'class' => 'form-control',
                    'placeholder' => 'Your feedback here',
                    'required' => true,
                ]) ?>
            </div>

            <!-- Submit Button -->
            <?= $this->Form->button('submit feedback', [
                'type' => 'submit',
                'class' => 'btn btn-danger',
                'confirm' => __('Submit this feedback?'),
                'formaction' => $this->Url->build([
                    'action' => 'addFeedback',
                    '?' => [
                        'dID' => $designId,
                        'cID' => $campaignId]
                ]),
            ]); ?>

            <?= $this->Form->end() ?>

        </section>
    </div>
</div>



