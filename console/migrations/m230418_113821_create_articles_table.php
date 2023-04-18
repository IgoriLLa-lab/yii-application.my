<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%articles}}`.
 */
class m230418_113821_create_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%articles}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'article' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%articles}}');
    }
}
