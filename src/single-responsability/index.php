<?php
    include "Document.php";
    include "ExportableDocumentInterface.php";
    include "HtmlExportableDocument.php";
    include "PdfExportableDocument.php";

    $document = new Document("Title", "Content");

    $htmlExportableDocument = new HtmlExportableDocument();
    $htmlExportableDocument->export($document);

    $pdfExportableDocument = new PdfExportableDocument();
    $pdfExportableDocument->export($document);