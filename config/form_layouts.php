<?php

return [

    'investments' => [
        'title' => 'Investment Form',
        'fields' => [
            'amount' => [
                'label' => 'Amount',
                'type' => 'number'
            ],
            'investor_name' => [
                'label' => 'Investor Name',
                'type' => 'text'
            ],
            'investment_date' => [
                'label' => 'Date',
                'type' => 'date'
            ],
        ],
    ],

    'policies' => [
        'title' => 'Policy Form',
        'fields' => [
            'policy_number' => [
                'label' => 'Policy Number',
                'type' => 'text'
            ],
            'holder_name' => [
                'label' => 'Holder Name',
                'type' => 'text'
            ],
            'issue_date' => [
                'label' => 'Issue Date',
                'type' => 'date'
            ],
        ],
    ],

    'followups' => [
        'title' => 'Follow-up Form',
        'fields' => [
            'customer_name' => [
                'label' => 'Customer Name',
                'type' => 'text'
            ],
            'status' => [
                'label' => 'Status',
                'type' => 'select',
                'options' => ['Pending', 'Completed']
            ],
            'followup_date' => [
                'label' => 'Follow-up Date',
                'type' => 'date'
            ],
        ],
    ],

];
