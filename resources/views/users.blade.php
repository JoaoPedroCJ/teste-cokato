@extends('layouts.manager')

@section('cokatoContent')

<div class="wrapper"> 
        <!-- Main Header -->
        <header class="main-header">
      
          <!-- Logo -->
          <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">COKATO</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">COKATO</span>
          </a>
      
          <!-- Header Navbar -->
          <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                  <!-- Menu Toggle Button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <img src="/dist/img/avatar5.png" class="user-image" alt="User Image">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs">COKATO</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">
                      <img src="/dist/img/avatar5.png" class="img-circle" alt="User Image">
      
                      <p>
                        Fulano Junior - Web Developer
                        <small>Membro desde Abr. 2018</small>
                      </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">
                      <div class="row">
                        <div class="col-xs-4 text-center">
                          <a href="#">Followers</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Sales</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Friends</a>
                        </div>
                      </div>
                      <!-- /.row -->
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                      </div>
                      <div class="pull-right">
                        <a href="#" class="btn btn-default btn-flat">Sair</a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
      
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
      
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
              <div class="pull-left image">
                <img src="/dist/img/avatar5.png" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <p>COKATO</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            </div>
      
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MENU</li>
              <!-- Optionally, you can add icons to the links -->
              <li class="active"><a href="#"><i class="fa fa-users"></i> <span>Usuários</span></a></li>
            </ul>
            <!-- /.sidebar-menu -->
          </section>
          <!-- /.sidebar -->
        </aside>
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Usuários
              <small>Gerenciamento de usuários do sistema</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
              <li class="active">Usuários</li>
            </ol>
          </section>
      
          <!-- Main content -->
          <section class="content container-fluid">
      
            <div class="row">
              <div class="col-md-8">
      
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Lista de Usuários</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10px">Foto</th>
                          <th>Nome</th>
                          <th>E-mail</th>
                          <th>Telefone</th>
                          <th>Ativo</th>
                          <th>Criado em</th>
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody id="user-table">

                        @if(@isset($users))
                            <?php $users2 = $users ?>
                          @foreach($users as $u)
                            <tr>
                              <td>
                                <img src="/dist/img/users/{{$u->photo}}" alt="User Image" class="img-circle img-sm">
                              </td>
                              <td><b>{{$u->name}}</b><br/>{{$u->role}}</td>
                              <td>{{$u->email}}</td>
                              <td>{{(strlen($u->phone)==11)? preg_replace('~(\d{2})[^\d]{0,8}(\d{1})[^\d]{0,8}(\d{4})[^\d]{0,8}(\d{4}).*~', '($1) $2 $3-$4', $u->phone):preg_replace('~(\d{2})[^\d]{0,7}(\d{4})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $u->phone)}}</td>
                              <td>{{$u->active == 1?'Sim':'Não'}}</td>
                              <td>{{date('d-m-Y', strtotime($u->created_at))}}</td>
                              <td>
                                <form action="{{url('edit', [$u->id])}}" method="POST">
                                  {{method_field('GET')}}
                                  @csrf
                                  <input type="submit" class="btn btn-primary btn-xs btn-flat" name="edit" value="EDITAR">
                                </form>
                                <form action="{{url('api/cokato', [$u->id])}}" method="POST">
                                  {{method_field('DELETE')}}
                                  @csrf
                                  <input name="_method" class="btn btn-danger btn-xs btn-flat" type="submit" value="DELETE" />
                                </form>
                              </td>
                            </tr>
                          @endforeach

                        @endif
                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
      
              </div>
              <div class="col-md-4">
      
                <div class="row">
                
                  <!-- ./col -->
                  <div class="col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                      <div class="inner">
                        <h3>1</h3>
                
                        <p>Administradores</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                      <div class="inner">
                        <h3>{{count($users)}}</h3>
                
                        <p>Cadastros</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
      
                <div class="box box-success">
                  @if(isset($users2)&&isset($editUser))
                  @foreach($users2 as $u2)
                  @if($u2->id==$editUser)
                  <div class="box-header with-border">
                      <h3 class="box-title">Editar Usuário</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="form-user-create" method="POST" action="{{url('api/cokato', [$u2->id])}}" enctype="multipart/form-data">
                      @csrf
                      <div class="box-body">
                        <div class="form-group">
                          <label for="InputName">Nome</label>
                          <input type="text" class="form-control" id="InputName" placeholder="Digite o nome" name="name" value="{{$u2->name}}">
                        </div>
                        <div class="form-group">
                            <label for="InputRole">Cargo</label>
                            <input type="text" class="form-control" id="InputRole" placeholder="Digite o cargo" name="role" value="{{$u2->role}}">
                        </div>
                        <div class="form-group">
                          <label for="InputEmail">E-mail</label>
                          <input type="email" class="form-control" id="InputEmail" placeholder="Digite o e-mail" name="email" value="{{$u2->email}}">
                        </div>
                        <div class="form-group">
                            <label for="InputPhone">Telefone</label>
                            <input type="text" class="form-control" id="InputPhone" placeholder="Digite o telefone" name="phone" value="{{$u2->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="InputFile">Foto</label>
                            <input type="file" id="InputFile" name="photo" value="{{$u2->photo}}">
                          </div>
                        <div class="checkbox">
                          <label>
                            @if($u2->active==1)
                            <input type="checkbox" name="active" id="InputActive" checked="checked">Ativo
                            @else
                            <input type="checkbox" name="active" id="InputActive">Ativo
                            @endif
                          </label>
                        </div>
                      </div>
                      <!-- /.box-body -->          
                      <div class="box-footer">
                        <form method="POST" action="{{url('api/cokato', [$u2->id])}}" enctype="multipart/form-data">
                          {{method_field('PATCH')}}
                          @csrf
                        <button type="submit" class="btn btn-success">Salvar</button>
                        </form>
                        <br><br>
                        <form method="POST" action="{{url('/')}}" enctype="multipart/form-data">
                        {{method_field('GET')}}
                          @csrf
                        <button type="submit" class="btn btn-warning">Cancelar</button>
                        </form>
                      </div>
                    </form>
                  @endif
                  @endforeach
                  @else
                  <div class="box-header with-border">
                      <h3 class="box-title">Novo Usuário</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="form-user-create" method="POST" action="{{url('api/cokato')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="box-body">
                        <div class="form-group">
                          <label for="InputName">Nome</label>
                          <input type="text" class="form-control" id="InputName" placeholder="Digite o nome" name="name">
                        </div>
                        <div class="form-group">
                            <label for="InputRole">Cargo</label>
                            <input type="text" class="form-control" id="InputRole" placeholder="Digite o cargo" name="role">
                        </div>
                        <div class="form-group">
                          <label for="InputEmail">E-mail</label>
                          <input type="email" class="form-control" id="InputEmail" placeholder="Digite o e-mail" name="email">
                        </div>
                        <div class="form-group">
                            <label for="InputPhone">Telefone</label>
                            <input type="text" class="form-control" id="InputPhone" placeholder="Digite o telefone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="InputFile">Foto</label>
                            <input type="file" id="InputFile" name="photo">
                          </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="active" id="InputActive" value="1">Ativo
                          </label>
                        </div>
                      </div>
                      <!-- /.box-body -->          
                      <div class="box-footer">
                        <button type="submit" class="btn btn-success">Salvar</button>
                      </div>
                    </form>
                  @endif
                  
                </div>
      
              </div>
            </div>
      
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
      
        <!-- Main Footer -->
        <footer class="main-footer">
          <!-- To the right -->
          <div class="pull-right hidden-xs">
            <a target="_blank" href="https://cokato.nerdvana.com.br">COKATO - Nerdvana</a>
          </div>
          <!-- Default to the left -->
          Projeto desenvolvido para o teste da COKATO.
        </footer>
      
      </div>

@endsection