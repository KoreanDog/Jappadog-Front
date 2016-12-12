<div class="row row-centered">
    <div class="table-responsive">
        <table class="table col-lg-12 col-centered">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Ingredients</th>
                <th>Price</th>
            </tr>
            {recipes}
            <tr>
                <td>{name}</td>
                <td>{description}</td>
                <td>
                    {ingredients}
                    {name} <br />
                    {/ingredients}
                </td>
                <td>{price}</td>
            </tr>
            {/recipes}
        </table>
        </ul>
    </div>
</div>

