<div class="row row-centered">

    <form action="/Production/CreateRecipe/" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name of the Recipe">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" placeholder="Description of the recipe.">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" placeholder="Price of the Recipe">
        </div>

        {ingredients}
        <div class="checkbox">
            <label>
                <input id="{id}" type="checkbox" {checked}> {name}
            </label>
        </div>
        {/ingredients}


        <button class="btn btn-success" role="button" type="submit">Save</button>
        <a class="btn btn-default" role="button" href="/Production">Cancel</a>

    </form>

</div>

