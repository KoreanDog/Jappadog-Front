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
      <tr>
        <td>{name}</td>
        <td class="text-center">{instock} units</td>
        <td class="col-lg-1"></td>
        <td class="text-center">{receiving} boxes</td>
        <td class="text-center">{measurement} units/box</td>
        <td class="text-center">${price}/box</td>
        <td><a class="btn btn-default" href="../Order/{id}" role="button">Order</a></td>
      </tr>
      <td class="col-lg-12">
        <a href="/Receiving">View All</a>
      </td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </table>
  </div>
</div>
