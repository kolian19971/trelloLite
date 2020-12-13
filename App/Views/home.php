<div class="card">

    <div class="card-body">

        <div class="text-right">
            <a class="btn btn-success" href="/home/add">
                Добавить
            </a>
        </div>

        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col"><a href="#">#</a></th>
                <th scope="col"><a href="#">Имя пользователя</a></th>
                <th scope="col"><a href="#">Email</a></th>
                <th scope="col"><a href="#">Текст задачи</a></th>
                <th scope="col"><a href="#">Статус</a></th>
            </tr>
            </thead>
            <tbody>
            <?php
                if(count($data['tasks'])){
                    foreach ($data['tasks'] as $task){
            ?>
                        <tr>
                            <th scope="row"><?php echo $task['id'];?></th>
                            <td><?php echo htmlspecialchars($task['user_name']);?></td>
                            <td><?php echo htmlspecialchars($task['email']);?></td>
                            <td><?php echo htmlspecialchars($task['description']);?></td>
                            <td>

                                <?php

                                    $statusClass = '';

                                    switch ($task['status']){

                                        case 'new':
                                            $statusClass = 'btn-primary';
                                            break;

                                        case 'in_work':
                                            $statusClass = 'btn-warning';
                                            break;

                                        case 'done':
                                            $statusClass = 'btn-success';
                                            break;

                                    }

                                ?>

                                <span class="btn btn-sm <?php echo $statusClass;?>"><?php echo $data['statusesArray'][$task['status']];?></span>

                            </td>
                        </tr>
            <?php
                    }
                }
            ?>
            </tbody>
        </table>


    </div>

</div>


