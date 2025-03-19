<?php
    class HtmlExportableDocument implements ExportableDocumentInterface
    {
        public function export(Document $document)
        {
            echo "DOCUMENT EXPORTED TO HTML".PHP_EOL;
            echo "Title:" . $document->getTitle().PHP_EOL;
            echo "Content:" . $document->getContent().PHP_EOL;
        }
    }