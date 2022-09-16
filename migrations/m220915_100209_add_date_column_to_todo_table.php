<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%todo}}`.
 */
class m220915_100209_add_date_column_to_todo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%todo}}', 'date', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%todo}}', 'date');
    }
}
