<?php
require_once getPath("Faq");

$faqs = [
    [
        "quest" => "What is the waterfall development model?",
        "ans" => "The waterfall model is a sequential development process that includes phases like understanding, designing, coding, testing, and maintenance."
    ],

    [
        "quest" => "Why is the waterfall model considered slow?",
        "ans" => "It follows a linear approach where each phase must be completed before moving to the next, leading to long development cycles and delayed deployments."
    ],

    [
        "quest" => "How do companies like Flickr achieve multiple deployments per day?",
        "ans" => "They use automated infrastructure, efficient version control, CI/CD pipelines, feature flags, and real-time monitoring to enable fast and reliable deployments."
    ],

    [
        "quest" => "What are the two phases of working with infrastructure?",
        "ans" => "The two phases are the initial setup (provisioning, configuring, and deploying) and maintenance (updating, backups, recovery, and scaling)."
    ],

    [
        "quest" => "What is Infrastructure as Code (IaC)?",
        "ans" => "IaC automates infrastructure setup and maintenance using tools like Terraform, Ansible, and CloudFormation."
    ],

    [
        "quest" => "What are some IaC tools?",
        "ans" => "Popular IaC tools include Terraform, Ansible, Puppet, Chef, and AWS CloudFormation."
    ],

    [
        "quest" => "What is the purpose of a version control system (VCS)?",
        "ans" => "A VCS helps store and manage code versions, enables collaboration, provides backups, and simplifies debugging."
    ],

    [
        "quest" => "What are some popular version control systems?",
        "ans" => "Common VCS tools include Git, GitHub, GitLab, Bitbucket, Perforce, and Apache Subversion."
    ],

    [
        "quest" => "How does CI/CD improve development?",
        "ans" => "CI/CD helps catch errors early, speeds up development by deploying features independently, and avoids merge conflicts."
    ],

    [
        "quest" => "What are feature flags?",
        "ans" => "Feature flags allow teams to enable or disable features without deploying new code, facilitating A/B testing and quick rollbacks."
    ],

    [
        "quest" => "Why are shared metrics important?",
        "ans" => "Shared metrics help monitor system performance, detect anomalies, and make data-driven decisions for application stability."
    ],

    [
        "quest" => "What tools can be used for shared metrics?",
        "ans" => "Prometheus, Grafana, and Datadog are commonly used tools for tracking real-time metrics."
    ],

    [
        "quest" => "How does company culture affect deployment efficiency?",
        "ans" => "A culture of respect, openness, and a healthy attitude toward failure encourages collaboration, innovation, and problem-solving."
    ],

    [
        "quest" => "What is a blame-free culture?",
        "ans" => "A blame-free culture focuses on identifying root causes and improving processes rather than assigning fault."
    ],

    [
        "quest" => "What are the key factors for achieving multiple deployments per day?",
        "ans" => "Automated infrastructure, version control, CI/CD pipelines, feature flags, shared metrics, and a strong company culture ensure efficient deployments."
    ]
];


foreach ($faqs as $faq) {
    $quest = $faq["quest"];
    $ans = $faq["ans"];

    // Create an FAQ skeleton
    $faqSkeleton = new FaqSkeleton(-1, $quest, $ans);

    $response = Faq::addFaq($faqSkeleton);
    echo json_encode($response) . "\n";
}



