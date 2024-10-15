<?php
/**
 * @var \App\View\AppView $this
 * @var \ContentBlocks\Model\Entity\ContentBlock $contentBlock
 */

$this->assign('title', 'Edit Content Block - Content Blocks');



$this->Html->script('ContentBlocks.ckeditor/ckeditor', ['block' => true]);

$this->Html->css('ContentBlocks.content-blocks', ['block' => true]);



?>



<div class="space"></div>
<style>
    .ck-editor__editable_inline {
        min-height: 25rem; /* CKEditor field minimal height */
    }

    .contentBlocks {
        background-color: #f9f9f9; /* Background color */
        border-radius: 8px; /* Rounded corners */
        padding: 20px; /* Padding inside the block */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
        width: 90%; /* Width is 90% of the screen */
        max-width: 900px; /* Maximum width is 900px */
        margin: 0 auto; /* Center the block */
    }

    .content-blocks--form-heading {
        color: #333; /* Text color */
        margin-bottom: 10px; /* Space below the heading */
    }

    .content-blocks--form-description {
        color: #666; /* Text color */
        margin-bottom: 20px; /* Space below the description */
    }

    .form-control {
        width: 100%; /* Full width for form controls */
        padding: 10px; /* Padding for input fields */
        border: 1px solid #ccc; /* Border color */
        border-radius: 4px; /* Rounded corners */
        font-size: 1.35rem; /* Font size for input fields */
        margin-bottom: 20px; /* Space below input fields */
    }

    .content-blocks--image-preview {
        max-width: 100%; /* Responsive image size */
        height: auto; /* Maintain aspect ratio */
        margin-bottom: 20px; /* Space below the image */
    }

    .content-blocks--form-actions {
        display: flex; /* Flexbox for buttons alignment */
        justify-content: space-between; /* Space between buttons */
        margin-top: 20px; /* Space above the action buttons */
    }

    .button {
        background-color: #007bff; /* Primary button color */
        color: white; /* Text color */
        border: none; /* Remove default border */
        border-radius: 4px; /* Rounded corners for buttons */
        cursor: pointer; /* Pointer cursor on hover */
        transition: background-color 0.3s; /* Transition effect */
    }

    .button:hover {
        background-color: #0056b3; /* Darker shade on hover */
    }

    a {
        color: #007bff; /* Link color */
        text-decoration: none; /* Remove underline */
    }

    a:hover {
        text-decoration: underline; /* Underline on hover */
    }

</style>

<div class="row">
    <div class="column-responsive">

        <div class="contentBlocks form content">

            <h3 class="content-blocks--form-heading"><?= $contentBlock->label ?></h3>

            <div class="content-blocks--form-description">
                <?= $contentBlock->description ?>
            </div>

            <?= $this->Form->create($contentBlock, ['type' => 'file']) ?>

            <?php
            if ($contentBlock->type === 'text') {
                $excludedSlugs = ['website-title', 'copyright', 'contact-number', 'contact-email',
                    'home-title', 'wcu-title1', 'wcu-title2', 'wcu-title3', 'TMs-title', 'TMs-loc1',
                    'TMs-name1', 'TMs-name2', 'TMs-name3', 'TMs-loc3', 'TMs-loc2', 'faq-question1',
                    'faq-question2', 'faq-question3','faq-question4','faq-question5', 'abt-title',
                    'abt-subtitle', 'abt-vidotitle', 'proc-title', 'proc-subtitle1', 'proc-subtitle2',
                    'proc-subtitle3'];
                if ((in_array($contentBlock->slug, $excludedSlugs))){
                    echo $this->Form->control('value', [
                        'type' => 'text',
                        'value' => html_entity_decode($contentBlock->value),
                        'label' => false,
                        'maxlength' => 100,
                    ]);
                }
                else{
                    echo $this->Form->control('value', [
                        'class' => 'form-control',
                        'type' => 'textarea',
                        'value' => html_entity_decode($contentBlock->value),
                        'label' => false,
                        'rows' => '4',
                        'maxlength' => 1000
                    ]);
                }

            }
            else if ($contentBlock->type === 'html') {
                echo $this->Form->control('value', [
                    'type' => 'textarea',
                    'label' => false,
                    'id' => 'content-value-input'
                ]);

                ?>
                <!-- Load CKEditor. -->
                <script>
                    /*
                    Create our CKEditor instance in a DOMContentLoaded event callback, to ensure
                    the library is available when we call `create()`.
                    Fixes https://github.com/ugie-cake/cakephp-content-blocks/issues/4.
                    */
                    document.addEventListener("DOMContentLoaded", (event) => {
                        CKSource.Editor.create(
                            document.getElementById('content-value-input'),
                            {
                                toolbar: [
                                    "heading", "|",
                                    "bold", "italic", "underline", "|",
                                    "bulletedList", "numberedList", "|",
                                    "alignment", "blockQuote", "|",
                                    "indent", "outdent", "|",
                                    "link", "|",
                                    "insertTable", "imageInsert", "mediaEmbed", "horizontalLine", "|",
                                    "removeFormat", "|",
                                    "sourceEditing", "|",
                                    "undo", "redo",
                                ],
                                simpleUpload: {
                                    uploadUrl: <?= json_encode($this->Url->build(['action' => 'upload'])) ?>,
                                    headers: {
                                    'X-CSRF-TOKEN': <?= json_encode($this->request->getAttribute('csrfToken')) ?>,
                                    }
                                }
                            }
                        ).then(editor => {
                        console.log(Array.from( editor.ui.componentFactory.names() ));
                        });
                    });
                </script>
                <?php
            } else if ($contentBlock->type === 'image') {

                if ($contentBlock->value) {
                    echo $this->Html->image($contentBlock->value, ['class' => 'content-blocks--image-preview']);
                }

                echo $this->Form->control('value', [
                    'type' => 'file',
                    'accept' => 'image/*',
                    'label' => false,
                ]);
            }

            ?>
            <div class="content-blocks--form-actions">
                <?= $this->Form->button(__('Save'), ['class' => 'button btn']) ?>
                <?= $this->Html->link('Cancel', ['action' => 'index']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

