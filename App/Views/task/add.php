<div class="card">

    <div class="card-body">

        <h5 class="card-title"><?php echo $data['title'];?></h5>

        <form method="post" action="/home/add">
            <div class="form-group row">
                <label for="userName" class="col-sm-2 col-form-label">Имя пользователя</label>
                <div class="col-sm-10">
                    <input required name="user_name" type="text" class="form-control" id="userName">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input required name="email" type="email" class="form-control" id="email">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="description">Описание задачи</label>
                <div class="col-sm-10">
                    <textarea required name="description" class="form-control" id="description" rows="3"></textarea>
                </div>
            </div>


<!--            <fieldset class="form-group">-->
<!--                <div class="row">-->
<!--                    <legend class="col-form-label col-sm-2 pt-0">Radios</legend>-->
<!--                    <div class="col-sm-10">-->
<!--                        <div class="form-check">-->
<!--                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>-->
<!--                            <label class="form-check-label" for="gridRadios1">-->
<!--                                First radio-->
<!--                            </label>-->
<!--                        </div>-->
<!--                        <div class="form-check">-->
<!--                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">-->
<!--                            <label class="form-check-label" for="gridRadios2">-->
<!--                                Second radio-->
<!--                            </label>-->
<!--                        </div>-->
<!--                        <div class="form-check disabled">-->
<!--                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>-->
<!--                            <label class="form-check-label" for="gridRadios3">-->
<!--                                Third disabled radio-->
<!--                            </label>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </fieldset>-->

            <div class="form-group row">
                <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
</div>