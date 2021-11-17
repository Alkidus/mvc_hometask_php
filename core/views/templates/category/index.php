<h1 class="text-center">Categories</h1>
<a href="/categories/create" class="btm btm-primary">Add Category</a>
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Nmae</th>
            <th>Description</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $item) : ?>
            <tr>
                <td><?= $item->id ?> </td>
                <td><?= $item->name ?> </td>
                <td><?= $item->description ?> </td>
                <td>
                    <a href="/categories/edit/<?= $item->id ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>