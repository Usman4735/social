<form action="{{ url('sa1991as/product-groups/permissions') }}/{{ $manager->id }}/{{ $product->id }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Permissions</th>
                        <th>See</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Price</td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="see_price" name="see_price" {{isset($permission) && $permission->see_price == 1 ? 'checked' : ''}} value="1">
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="edit_price" name="edit_price" {{isset($permission) && $permission->edit_price == 1 ? 'checked' : ''}} value="1">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Photos on Website</td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="see_photos" name="see_photos" {{isset($permission) && $permission->see_photos == 1 ? 'checked' : ''}} value="1">
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="edit_photos" name="edit_photos" {{isset($permission) && $permission->edit_photos == 1 ? 'checked' : ''}} value="1">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Description on Website</td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="see_description" name="see_description" {{isset($permission) && $permission->see_description == 1 ? 'checked' : ''}} value="1">
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="edit_description" name="edit_description" {{isset($permission) && $permission->edit_description == 1 ? 'checked' : ''}} value="1">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tags</td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="see_tags" name="see_tags" {{isset($permission) && $permission->see_tags == 1 ? 'checked' : ''}} value="1">
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="edit_tags" name="edit_tags" {{isset($permission) && $permission->edit_tags == 1 ? 'checked' : ''}} value="1">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-primary" value="Save Permission" title="Save Permission">
        </div>
    </div>
</form>
