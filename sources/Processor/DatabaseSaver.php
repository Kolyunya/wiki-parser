<?php

namespace Kolyunya\WikiParser\Processor;

use Kolyunya\WikiParser\Language\LanguageInterface;
use Kolyunya\WikiParser\Processor\ProcessorInterface;
use PDO;

/**
 * A processor which saves items to files.
 */
class DatabaseSaver implements ProcessorInterface
{
    /**
     * PDO connection
     * @var PDO
     */
    private $connection;

    /**
     * Table name in which to insert words.
     * @var string
     */
    private $tableName;

    /**
     * Column name in which to insert words.
     * @var string
     */
    private $columnName;

    /**
     * Generic insert query
     * @var string
     */
    private $query;

    /**
     * Generic insert statement
     * @var PDOStatement
     */
    private $statement;

    /**
     * Constructs the database saver
     * @param string $tableName Table name in which to insert words.
     * @param string $columnName Column name in which to insert words.
     */
    public function __construct($connection, $tableName, $columnName)
    {
        $this->connection = $connection;
        $this->tableName = $tableName;
        $this->columnName = $columnName;
        $this->initializeQuery();
        $this->initializeStatement();
    }

    /**
     * @inheritdoc
     */
    public function process(LanguageInterface $language, &$item)
    {
        $this->statement->bindValue(':word', $item, PDO::PARAM_STR);
        $this->statement->execute();
    }

    /**
     * Initializes generic insert query
     */
    private function initializeQuery()
    {
        $this->query = "
            INSERT INTO {$this->tableName}
                ( {$this->columnName} )
            VALUES
                ( :word )
        ";
    }

    /**
     * Initializes generic insert statement
     */
    private function initializeStatement()
    {
        $this->statement = $this->connection->prepare($this->query);
        if (!$this->statement) {
            throw new Exception('Could not prepare SQL query');
        }
    }
}
