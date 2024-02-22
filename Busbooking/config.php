<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51OMn9KEME0f0R52dwUWMs0MZSLkkXcVs1RELvN55o0nkffT7xNjqi4Ysh97X6XjOmcpPRj8dIrb6VxryFjVfywER00ST8dve8N",
        "publishableKey" => "pk_test_51OMn9KEME0f0R52dJ1UfPTeNTzQedQPgE64w9t2gHHRWmvy0QlfXQu64WKMAwGV5W8OO6OCp0qlr5910F4vnKjxq00hlyjTHA3"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>