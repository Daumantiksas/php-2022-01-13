<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Contact form</h2>
            <?php if(isset($_POST["save"])):?>
                <?php validate($_POST);?>
                <?php endif;?>
                <?php if(empty($validationErrors)):?>
             <?php saveMessage($_POST)?> 
                <?php else:?>
                    <ul>
                    <?php foreach($validationErrors as $error):?>
                        <li class="alert alert-danger"><?=$error;?> </li>
                        <?php endforeach;?>
                    </ul>
             <?php endif;?>
             
             <?php if($validationErrors || empty($_POST)):?>
    <form method="POST">
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Iveskite varda" name="name">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Iveskite pavarde" name="lname">
    </div>
    <div class="mb-3">
        <input type="email" class="form-control" placeholder="El. pastas" name="email">
    </div>
    <div class="mb-3">
        <label>Pasirinkite akiu spalva:</label>
        <input type="color" class="form-control" placeholder="Akiu spalva" name="color">
    </div>
    <div class="mb-3">
    <select class="form-control" name="departaments">
    <option selected disabled>--Pasirinkite skyriu--</option>
    <?php foreach($departaments as $key=>$departament) :?>
        <option value=<?= $key;?>><?=$departament;?></option>
    <?php endforeach; ?>
</select>
</div>
<div class="mb-3">
                <textarea cols="30" rows="10" class="form-control" placeholder="žinutė nuo 1 iki 200 simbolių" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="save">Saugoti</button>
    </form>
    <?php endif;?>
        <section>
            <h3>Clients messages</h3>
            <table class="table table-bordered table-striped">
                <th>Vardas</th>
                <th>Pavarde</th>
                <th>El.Pastas</th>
                <th>akiu spalva</th>
                <th>skyrius</th>
                <th>zinute</th>
                <?php foreach (getData() as $list):?>
                    <tr>
                        <?php $list = explode(',', $list);?>
                        <?php foreach($list as $item):?>
                            <?php if(!empty($item)):?>
                            <td><?=$item;?></td>
                            <?php endif;?>
                            <?php endforeach;?>
                    </tr>
                    <?php endforeach;?>
            </table>
        </section>
    </div>
</body>
</html>