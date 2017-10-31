<?php

$rows = array(
    array(
        'sql_query'     => "SELECT p.method,count(o.increment_id) AS 'num' FROM sales_flat_order AS o, sales_flat_order_payment AS p WHERE o.entity_id = p.parent_id GROUP BY p.method ORDER BY num desc",
        'title'         => 'Sample: Sales Order By Payment Method',
        'created_at'    => NULL,
        'output_type'   => 'PieChart',
        'chart_config'  => '{height: 900,width: 1100, title: "Sales Order By Payment Method"}',
        'grid_config'   => '{"filterable": {"Customers": "adminhtml/widget_grid_column_filter_range"}}'
    ),
    array(
        'sql_query'     => "SELECT sales_order_status.label AS 'Status', COUNT(sales_flat_order.entity_id) AS 'Orders' FROM sales_flat_order LEFT JOIN sales_order_status ON sales_flat_order.status = sales_order_status.status GROUP BY sales_flat_order.status ORDER BY COUNT(sales_flat_order.entity_id) DESC",
        'title'         => 'Sample: Order Status',
        'created_at'    => NULL,
        'output_type'   => 'PieChart',
        'chart_config'  => '{height: 900, width: 1100, title: "Order Status"}',
        'grid_config'   => '{"filterable": {"Status": "adminhtml/widget_grid_column_filter_text", "Orders": "adminhtml/widget_grid_column_filter_range"}}'
    ),
    array(
         'sql_query'    => "SELECT sales_flat_order_address.country_id , count(*) FROM sales_flat_order  INNER JOIN sales_flat_order_address ON sales_flat_order.entity_id = sales_flat_order_address.parent_id AND sales_flat_order_address.address_type='shipping' GROUP BY sales_flat_order_address.country_id",
        'title'         => 'Sample: Sales Order Report Country Wise ',
        'created_at'    => NULL,
        'output_type'   => 'PieChart',
        'chart_config'  => '{height: 900, width: 1100, title: "Order Status"}',
        'grid_config'   => '{"filterable": {"Status": "adminhtml/widget_grid_column_filter_text", "Orders": "adminhtml/widget_grid_column_filter_range"}}'
    ),
);

$resource = Mage::getSingleton('core/resource');
$table = $resource->getTableName('cleansql_report');
$resource->getConnection('core_write')->insertMultiple($table, $rows);