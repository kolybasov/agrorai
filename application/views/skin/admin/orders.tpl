        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-11">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">{$p.text}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="control-bar btn-group">
                                    <a class="btn btn-success btn-sm" href="{base_url()}admin/orders/all">Всі</a>
                                    <a class="btn btn-success btn-sm" href="{base_url()}admin/orders/new">Нові</a>
                                    <a class="btn btn-success btn-sm" href="{base_url()}admin/orders/archive">Архів</a>
                                </div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="check_all"></th>
                                        <th>П.І.Б.</th>
                                        <th>Товар</th>
                                        <th>Дата</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {foreach $o as $i}
                                        {if $i.is_new==0}<tr>{else}<tr class="success">{/if}
                                        <td><input type="checkbox" name="selector" value="{$i.order_id}"></td>
                                        <td><a href="{base_url()}admin/order/{$i.order_id}">{$i.pib}</a></td>
                                        <td>{if $i.commodity=='bean'}Cоєва макуха{else}Cоєва олія{/if}</td>
                                        <td>{$i.date}</td>
                                        </tr>
                                    {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<script src="{js_url()}jquery-1.10.2.min.js"></script>
		<script src="{js_url()}admin/scripts.js"></script>
	</body>
</html>