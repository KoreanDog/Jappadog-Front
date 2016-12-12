<h1>Sales</h1>

<div class=table-responsive>
    <table class="table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Description</th>
                <th>Quantity Available</th>
                <th>Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {stock}
            <tr>
                <td>{name}</td>
                <td>{description}</td>
                <td>{quantity}</td>
                <td>{price}</td>
                <td><a href="/sales/add/{id}"><button type="button" class="btn btn-default btn-danger btn-sm">Add to Cart</button></a></td>
            </tr>
            {/stock}
    <div class="w3-third w3-center">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Your Cart</h3>
            </div>
            <div class="panel-body">
                {receipt}
            </div>
            <div class="panel-footer">
                <a role="button" class="btn btn-success" href="/sales/checkout">Checkout</a>
                <a role="button" class="btn btn-danger" href="/sales/cancel">Cancel Order</a>
            </div>

        </div>
    </div>
        </tbody>
    </table>
</div>