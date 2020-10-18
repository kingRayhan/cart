DROP VIEW IF EXISTS products_variation_stock_view;
CREATE VIEW products_variation_stock_view AS
SELECT
    product_variations.product_id AS product_id,
    product_variations.id AS product_variation_id,
    COALESCE(
        SUM(stocks.quantity) - COALESCE(SUM(product_variation_order.quantity), 0),
        0
    ) AS stock
from product_variations
    LEFT JOIN(
        SELECT
            stocks.product_variation_id as id,
            SUM(stocks.quantity) as quantity
        from
            stocks
        GROUP by
            stocks.product_variation_id
    ) as stocks USING (id)
    LEFT JOIN (
        SELECT
            product_variation_order.product_variation_id as id,
            SUM(product_variation_order.quantity) as quantity
        FROM
            product_variation_order
        GROUP BY
            product_variation_order.product_variation_id
    ) AS product_variation_order USING (id)
GROUP BY
    product_variations.id
