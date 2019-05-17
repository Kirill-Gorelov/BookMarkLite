<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"> -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
<script src="main.js" ></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
<link rel="stylesheet" href="dist/style.min.css" />

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script> -->
<script src="dist/jstree.min.js"></script>
<title>Менеджер закладок</title>
<style>
.hiddens{
  display:none;
}
</style>
</head>
<body>
<nav class="navbar navbar-dark bg-warning">
  <a class="navbar-brand">BookMarks</a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">поиск по ссылкам</button>
  </form>
</nav>

<div class="container m-1">
    <div class="row">
        <div class="col-3" style="border-right: 1px solid;">
            <div class="row">
                <input id="plugins4_q" placeholder="Поиск" class="form-control m-2">
            </div>
            <div class="row">
                <div id="tree-container"></div>
            </div>
        </div>
        <div class="col-8">
        <!-- <button type="button" class="btn btn-primary m-2 add" data-toggle="modal" data-target="#exampleModal" style="float: left;">
          Добавить ссылку
        </button> -->

        <button type="button" class="btn btn-success m-2 add_folder"  style="float: left;">
          Добавить папку
        </button>

        <button type="button" class="btn btn-primary m-2 add_link" style="float: left;">
          Добавить ссылку
        </button>

        <input id="value" placeholder="Название" class="form-control m-2 w-25" style="float: left;">
        <input id="id_folder" type="hidden" >

        <button type="button" class="btn btn-danger m-2 delete_folder">Удалить папку</button>

        <div class="alert alert-success alert-dismissible fade show hiddens" role="alert">
        Создалась
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="alert alert-danger alert-dismissible fade show hiddens" role="alert">
        Ошибка 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="contents_result"></div>
        </div>
    </div>
</div>

<!-- модальное окно добавления -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить ссылку</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Зыкрыть</button>
        <button type="button" class="btn btn-primary add_save">Сохранить</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

</script>
</body>
</html>
