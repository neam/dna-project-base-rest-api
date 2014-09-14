<?php

class m140905_121917_change_hebrew_lancgode extends EDbMigration
{

    private $indexedItemSlugTables = array(
        'i18n_catalog',
        'tool',
        'video_file',
        'snapshot',
    );

    private $tablesWithSlugIw = array(
        'chapter',
        'data_article',
        'data_source',
        'exam_question',
        'exam_question_alternative',
        'exercise',
        'menu',
        'page',
        'section',
        'slideshow_file',
        'text_doc',
        'vector_graphic',
        'waffle',
        'i18n_catalog',
        'tool',
        'video_file',
        'snapshot',
    );

	public function up()
	{
        $hebrewOldCode = 'iw';
        $hebrewNewCode = 'he';

        foreach ($this->indexedItemSlugTables as $table) {
            $this->dropIndex("slug_{$hebrewOldCode}_UNIQUE", $table, "slug_{$hebrewOldCode}");
        }

        foreach ($this->tablesWithSlugIw as $table) {
            $this->renameColumn($table, "slug_{$hebrewOldCode}", "slug_{$hebrewNewCode}");
            $this->renameColumn(
                "{$table}_qa_state",
                "translate_into_{$hebrewOldCode}_validation_progress",
                "translate_into_{$hebrewNewCode}_validation_progress"
            );
        }

        foreach ($this->indexedItemSlugTables as $table) {
            $this->createIndex("slug_{$hebrewNewCode}_UNIQUE", $table, "slug_{$hebrewNewCode}", true);
        }
	}

	public function down()
	{
        $hebrewOldCode = 'iw';
        $hebrewNewCode = 'he';

        foreach ($this->indexedItemSlugTables as $table) {
            $this->dropIndex("slug_{$hebrewNewCode}_UNIQUE", $table, "slug_{$hebrewNewCode}");
        }

        foreach ($this->tablesWithSlugIw as $table) {
            $this->renameColumn($table, "slug_{$hebrewNewCode}", "slug_{$hebrewOldCode}");
            $this->renameColumn(
                "{$table}_qa_state",
                "translate_into_{$hebrewNewCode}_validation_progress",
                "translate_into_{$hebrewOldCode}_validation_progress"
            );
        }

        foreach ($this->indexedItemSlugTables as $table) {
            $this->createIndex("slug_{$hebrewOldCode}_UNIQUE", $table, "slug_{$hebrewOldCode}", true);
        }
	}

}
