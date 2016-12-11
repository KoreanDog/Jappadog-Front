<div class="row row-centered">
  <div class="table-responsive">
    <table class="table col-lg-12 col-centered">
      <tr>
        <th>Ingredient</th>
        <th class="text-center">In Stock</th>
        <th></th>
        <th class="text-center">Order Quantity</th>
        <th class="text-center">Order Measurment</th>
        <th class="text-center">Price</th>
        <th></th>
      </tr>
        {ingredients}
      <tr>
        <td><a href="Receiving/Ingredient/{id}">{name}</a></td>
        <td class="text-center">{instock} units</td>
        <td class="col-lg-1"></td>
        <td class="text-center">{receiving} boxes</td>
        <td class="text-center">{measurement} units/box</td>
        <td class="text-center">${price}/box</td>
        <td><a class="btn btn-default" href="Receiving/Order/{id}" role="button">Order</a></td>
      </tr>
        {/ingredients}
    </table>
  </div>
</div>
