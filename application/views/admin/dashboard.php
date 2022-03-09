<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>

<html>

<head>
    <?php $this->load->view('admin/inc/header'); ?>
</head>

<body class="skin-red">
    <?php $this->load->view('admin/inc/navbar'); ?>
    <?php $this->load->view('admin/inc/sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <h1>

                <small>WELCOME TO CEDAR PORTAL</small>
            </h1>

        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <!-- Main content -->
                            <section class="content">
                                <?php $this->load->view('admin/slider'); ?>
                            </section><!-- /.content -->
                        </div><!-- /.content-wrapper -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
    </div><!-- /.row -->
    </section><!-- /.content -->

    <?php $this->load->view('admin/inc/footer'); ?>
</body>

</html>