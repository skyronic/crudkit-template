<?php

require "vendor/autoload.php";
use CrudKit\CrudKitApp;
use CrudKit\Pages\SQLiteTablePage;
use CrudKit\Pages\BasicLoginPage;

// Create a new CrudKitApp object
$app = new CrudKitApp ();
$app->setStaticRoot ("static/crudkit/");
$app->setAppName ("Admin Panel");

// 
// HANDLE LOGIN
// 
$login = new BasicLoginPage ();
$login->setWelcomeMessage ("Use credentials admin/demo or user/demo");
if ($login->userTriedLogin ()) {
    $username = $login->getUserName ();
    $password = $login->getPassword ();

    // TODO: you should use your own authentication scheme here
    if ($username === 'admin' && $password === 'demo') {
        $login->success ();
    }
    else if ($username === 'user' && $password === 'demo') {
        $login->success ();
    }
    else {
        $login->fail ("Please check your password (admin/demo) or (user/demo)");
    }
}
$app->useLogin ($login);
// 
// END HANDLING LOGIN.
// 

if ($login->getLoggedInUser () === "user") {
    // If the user isn't `admin` then use read-only 
    $app->setReadOnly (true);
}

$page = new SQLiteTablePage ("sqlite2", "demo_database.sqlite");
$page->setName("Customer Management")
    ->setTableName("Customer")
    ->setRowsPerPage (20)
    ->setPrimaryColumn("CustomerId")
    ->addColumn("FirstName", "First Name", array(
        'required' => true
    ))
    ->addColumn("LastName", "Last Name")
    ->addColumn("City", "City", array(
        'required' => true
    ))
    ->addColumn("Country", "Country")
    ->addColumn("Email", "E-mail")
    ->setSummaryColumns(array("FirstName", "Country"));
$app->addPage($page);

$invoice = new SQLiteTablePage ("sqlite1", "demo_database.sqlite");
$invoice->setName("Invoice")
    ->setPrimaryColumnWithId("a0", "InvoiceId")
    ->setTableName("Invoice")
    ->addColumnWithId("a1", "BillingCity", "City")
    ->addColumnWithId("a2", "BillingCountry", "Country")
    ->addColumnWithId("a3", "Total", "Total")
    ->addColumnWithId("a4", "InvoiceDate", "Date", array(
    ))
    ->setSummaryColumns(["a1", "a2", "a3", "a4"]);
$app->addPage($invoice);

// Render the app. This will display the HTML
$app->render ();
