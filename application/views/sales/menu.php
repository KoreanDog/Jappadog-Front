<div class="row row-centered">
  <div class="table-responsive">
    <table class="table col-lg-8 col-centered">
      <tr>
        <th>Menu Item</th>
        <th class="text-center">price</th>
        <th></th>
      </tr>
        {menu}
      <tr>
        <td><a href="Sales/ItemDetail/{name}">{name}</a></td>
        <td class="text-center">${price}</td>
        <td><a class="btn btn-default" href="" role="button">Order</a></td>
      </tr>
        {/menu}
    </table>
  </div>
</div>