<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campaign $campaign
 */

$this->layout = 'frontend';
$this->assign('title', 'Campaign');
?>

<!--
Copyright (c) 2024 by Emil Devantie Brockdorff (https://codepen.io/Mestika/pen/xbgqbp)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
-->




<div class="space"></div>
<body id="sigupbody">


<?= $this->Form->create($campaign, ['url' => ['action' => 'create'], 'id' => 'signup']) ?>



    <ul id="section-tabs">
        <li class="current active orderli" ><span>1.</span> Step1</li>
        <li class="orderli"><span>2.</span> Step2</li>
        <li class="orderli"><span>3.</span> Step3</li>
        <li class="orderli"><span>4.</span> Step4</li>
    </ul>

    <div id="fieldsets">
        <fieldset class="current">

            <div class="form-group">

                <?= $this->Form->control('name', [
                    'label' => 'Activity Name',
                    'required' => true,
                    'pattern' => '[a-zA-Z\s]*',
                    'minlength' => '3',
                    'title' => 'Activity Name should only contain letters and spaces',
                    'placeholder' => 'Enter activity name',
                ]) ?>
            </div>

        </fieldset>

        <fieldset class="next">

            <div class="form-group">
                <?= $this->Form->control('default_sales_price', [
                    'label' => 'Default Sales Price',
                    'required' => true,
                    'type' => 'number',
                    'min' => '0',
                    'step' => '0.01',
                    'placeholder' => 'Enter default sales price',
                ]) ?>
            </div>


        </fieldset>

        <fieldset class="next">

            <?= $this->Form->control('start_date', [
                'label' => 'Start Date',
                'required' => true,
                'type' => 'date',
            ]) ?>


        </fieldset>

        <fieldset class="next">

            <?= $this->Form->control('end_date', [
                'label' => 'End Date',
                'required' => true,
                'type' => 'date',
            ]) ?>

        </fieldset>

        <a class="btn" id="next">Next Section ▷</a>
        <input type="submit" class="btn">



    </div>

</form>
<?= $this->Flash->render() ?>


</body>
</html>
