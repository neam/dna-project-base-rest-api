<script>

    function init$gii() {
        window.giiwin = $('#gii')[0].contentWindow;
        window.$gii = giiwin.$;
    }

    function s1() {
        init$gii();
        var model = $('select[name="model"]').val();
        $gii('#FullCrudCode_model').val(model).keyup();

        // Define default options
        $gii('#FullCrudCode_textEditor').val('texteditor');
        if (model == 'ExamQuestion' ||
            model == 'ExamQuestionAlternative' ||
            model == 'HtmlChunk') {
            $gii('#FullCrudCode_textEditor').val('html5Editor');
        }
        $gii('#FullCrudCode_internalModels').val('EzcExecution,Node'.split(','));

        $gii('input[name="preview"]').click();
        setTimeout(function () {
            init$gii();
            $("html,body").animate({
                scrollTop: 100,
                scrollLeft: 0
            });
            $gii("html,body").animate({
                scrollTop: 1800,
                scrollLeft: 200
            });
        }, 1000);
    }
    function s2() {
        init$gii();
        $gii('input[type="checkbox"]').attr('checked', true);
        $gii('input[name="generate"]').click();
    }

    function previewAll() {
        $('#model option').each(function (i, el) {

            setTimeout(function () {

                $(el).attr('selected', 'selected');
                $('#s1').click();

            }, i * 5000);

        });

    }

    $(function () {
        $('#gii')[0].contentWindow.onload = function () {
            init$gii();
        };

        $('#s1').click(s1);
        $('#s2').click(s2);
        $('#previewAll').click(previewAll);
        $('#reconnect').click(init$gii);

    });


</script>

<style>

    #gii {
        width: 100%;
        height: 700px;
    }

</style>

<?php
echo CHtml::dropDownList('model', null, array(
    'Chapter' => 'Chapter',
    'DataChunk' => 'DataChunk',
    'DataSource' => 'DataSource',
    'DownloadLink' => 'DownloadLink',
    'ExamQuestion' => 'ExamQuestion',
    'ExamQuestionAlternative' => 'ExamQuestionAlternative',
    'Exercise' => 'Exercise',
    'HtmlChunk' => 'HtmlChunk',
    'PoFile' => 'PoFile',
    'Section' => 'Section',
    'SectionContent' => 'SectionContent',
    'SlideshowFile' => 'SlideshowFile',
    'Snapshot' => 'Snapshot',
    'SpreadsheetFile' => 'SpreadsheetFile',
    'TeachersGuide' => 'TeachersGuide',
    'TextDoc' => 'TextDoc',
    'Tool' => 'Tool',
    'VectorGraphic' => 'VectorGraphic',
    'VideoFile' => 'VideoFile',
    'EzcWorkflow' => 'EzcWorkflow',
));

?>

<p>
    <a href="#" id="s1" class="btn">Preview</a>
    <a href="#" id="s2" class="btn">Generate</a>
</p>
<p>
    <a href="#" id="previewAll" class="btn">Preview All</a>
    <a href="#" id="reconnect" class="btn">Reconnect to frame</a>
</p>

<iframe id="gii" src="<?php echo Yii::app()->request->baseUrl; ?>/gii/fullCrud"></iframe>

<?php

