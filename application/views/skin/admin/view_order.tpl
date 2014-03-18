        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a href="{base_url()}admin/orders"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Назад</a>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="btn-group margin-bottom">
                                    <a href="#" id="archive_current" class="btn btn-success btn-sm" title="Перемістити до архіву">
                                        <span class="glyphicon glyphicon-inbox"></span>
                                    </a>
                                    <a href="#" id="delete_current" class="btn btn-success btn-sm" title="Видалити">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </div>
                                <input type="checkbox" class="hidden" name="selector" value="{$p.order_id}" checked="checked" id="order_id">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="table-left">
                                                Замовник:
                                            </td>
                                            <td class="table-right">
                                                {$p.pib}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-left">
                                                Контактний телефон:
                                            </td>
                                            <td class="table-right">
                                                {$p.phone}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-left">
                                                Адреса:
                                            </td>
                                            <td class="table-right">
                                                {$p.address}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-left">
                                                Товар:
                                            </td>
                                            <td class="table-right">
                                                {if $p.commodity=='bean'}соєва макуха{else}соєва олія{/if}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-left">
                                                Кількість:
                                            </td>
                                            <td class="table-right">
                                                {$p.count}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-left">
                                                Дата:
                                            </td>
                                            <td class="table-right">
                                                {$p.date}
                                            </td>
                                        </tr>
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