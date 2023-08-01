<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%stages}}`.
 */
class m230713_184023_add_columns_to_stages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('stages', 'is_bankruptcy', $this->tinyInteger()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('stages', 'is_bankruptcy');
    }
}
