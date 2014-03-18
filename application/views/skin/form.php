<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Зміна цін</h3>
                </div>
                <div class="panel-body">
                    <div class="alert alert-danger hidden" id="inputError">Помилка! Ціни не змінено. Введіть коректну ціну.</div>
                    <div class="alert alert-success hidden" id="priceSuccess">Успіх! Ціни успішно змінено.</div>
                    <div class="alert alert-danger hidden" id="connectionError">Помилка з'єднання! Ціни не змінено.</div>
                    <form role="form" action="#">
                        <label for="bean_price">Ціна на макуху</label>
                        <div class="input-group">
                            <input class="form-control" type="text" id="bean_price"/>
                            <span class="input-group-addon">грн/т</span>
                        </div>
                        <label for="oil_price">Ціна на олію</label>
                        <div class="input-group">
                            <input class="form-control" type="text" id="oil_price"/>
                            <span class="input-group-addon">грн/т</span>
                        </div>
                        <br>
                        <button class="btn btn-primary" id="change_price">Оновити ціну</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>