<?php
require_once getPath("conn");
require_once getPath("cors-headers");
require_once getPath("Faq");

// Fetch all FAQs
$faqs = Faq::getAllFaqs();

http_response_code(200);
echo json_encode($faqs);
exit();