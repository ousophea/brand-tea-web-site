<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="Paweł 'kilab' Balicki - kilab.pl" />
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . BACKEND_TEMPLATE; ?>css/style.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . BACKEND_TEMPLATE; ?>css/navi.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . BACKEND_TEMPLATE; ?>js/jcrop/css/jquery.Jcrop.css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() . BACKEND_TEMPLATE; ?>js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . BACKEND_TEMPLATE; ?>js/category.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . BACKEND_TEMPLATE; ?>js/product.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . BACKEND_TEMPLATE; ?>js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . BACKEND_TEMPLATE; ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . BACKEND_TEMPLATE; ?>js/jcrop/js/jquery.Jcrop.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . BACKEND_TEMPLATE; ?>js/jquery.wallform.js"></script>
        <script type="text/javascript" src="<?php echo base_url() . BACKEND_TEMPLATE; ?>js/translation.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".box .h_title").not(this).next("ul").hide("normal");
                $(".box .h_title").not(this).next("#home").show("normal");
                $(".box").children(".h_title").click(function() {
                    $(this).next("ul").slideToggle();
                });
            });
        </script>

        <!--TinyMCE-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>addon/tinymce/js/tinymce/skins/lightgray/skin.min.css" media="all" />
        <script type="text/javascript" src="<?php echo base_url(); ?>addon/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
//            Do not foget to config some paths in addon/tinymce/js/tinymce/plugins/filemanager/config/config.php
            tinymce.init({
                selector: "textarea.tinyMCE",
                theme: "modern",
                external_filemanager_path: '<?php echo base_url(); ?>addon/tinymce/js/tinymce/plugins/filemanager/',
                width: 500,
                height: 300,
                relative_urls: false,
                remove_script_host: false,
                subfolder: "",
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons paste textcolor filemanager fullscreen"
                ],
                image_advtab: true,
                toolbar: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect forecolor backcolor | link unlink anchor | image media | print preview code fullscreen"
            });
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>addon/tinymce/js/tinymce/plugins/filemanager/plugin.min.js"></script>
        <!--End TinyMCE-->

    </head>
    <body>

        <?php echo form_open(); ?>
        <input type="hidden" value="<?php echo base_url(); ?>" id="base_url" />
        <?php echo form_close(); ?>
        <div class="wrap">
            <div id="header">
                <div id="top">
                    <div class="left" >
                        <!--<h2>Pichnil</h2>-->
                    </div>
                    <div class="right">
                        <div class="align-right">
                            <p><?php echo $this->lang->line('welcome'); ?>: <strong><?php echo $this->session->userdata('userName'); ?></strong> | <?php echo anchor('authentication/logout', $this->lang->line('logout')); ?></p>
                        </div>
                    </div>
                </div>
                <div id="nav">
                    <ul>
                        <li class="upp"><?php echo anchor('admin', $this->lang->line('men_dashboard')); ?>
                        </li>
                        <li class="upp"><?php echo anchor('product', $this->lang->line('men_product')); ?>
                            <ul>
                                <li>&#8250; <?php echo anchor('product/addnew', $this->lang->line('men_add_new')); ?></li>
                            </ul>
                        </li>
                        <li class="upp"><?php echo anchor('category', $this->lang->line('men_category')); ?>
                            <ul>
                                <li>&#8250; <?php echo anchor('category/addnew', $this->lang->line('men_add_new')); ?></li>
                            </ul>                         
                        </li>
                        <li class="upp"><?php echo anchor('group', $this->lang->line('men_group')); ?>
                           <ul>
                                <li>&#8250; <?php echo anchor('group/addnew', $this->lang->line('men_add_new')); ?></li>
                            </ul> 
                        </li>
                        <li class="upp"><?php echo anchor('slideshow', $this->lang->line('men_slideshow')); ?>
                            <ul>
                                <li>&#8250; <?php echo anchor('slideshow/addnew', $this->lang->line('men_add_new')); ?></li>
                                <li>&#8250; <?php echo anchor('slideshow/category/listcat', $this->lang->line('men_slide_cat')); ?></li>
                                <li>&#8250; <?php echo anchor('slideshow/category/addnew', $this->lang->line('men_add_new_slide_cat')); ?></li>
                                
                            </ul> 
                        </li>

                        <li class="upp"><?php echo anchor('tearelated', $this->lang->line('men_tearelated')); ?>
                            <ul>
                                <li>&#8250; <?php echo anchor('tearelated/addnewtea', $this->lang->line('men_add_new')); ?></li>
                            </ul> 
                        </li>

                        <li class="upp"><?php echo anchor('content/home', $this->lang->line('men_home')); ?>
                            <!--                            <ul>
                                                            <li>&#8250; <a href="">Show all uses</a></li>
                                                            <li>&#8250; <a href="">Add new user</a></li>
                                                            <li>&#8250; <a href="">Lock users</a></li>
                                                        </ul>-->
                        </li>
                        <li class="upp"><?php echo anchor('content/services', $this->lang->line('men_services')); ?></li>
                        <li class="upp"><?php echo anchor('about', $this->lang->line('men_about')); ?>
                        </li>
                        <li class="upp"><?php echo anchor('contact', $this->lang->line('men_contact')); ?>
                        </li>
                        
                    </ul>
                </div>
            </div>

            <div id="content">
<!--                <div id="sidebar">
                    <div class="box">
                        <div class="h_title">&#8250; Product</div>
                        <ul id="home">
                            <li class="b1"><a class="icon page" href="">Show all products</a></li>
                                                        <li class="b2"><a class="icon report" href="">Reports</a></li>
                            <li class="b1"><a class="icon add_page" href="">Add product</a></li>
                            <li class="b2"><a class="icon config" href="">Site config</a></li>
                        </ul>
                    </div>

                    <div class="box">
                        <div class="h_title">&#8250; Category</div>
                        <ul>
                            <li class="b1"><a class="icon page" href="">Show all categories</a></li>
                            <li class="b2"><a class="icon add_page" href="">Add category</a></li>
                                                        <li class="b1"><a class="icon photo" href="">Add new gallery</a></li>
                                                        <li class="b2"><a class="icon category" href="">Categories</a></li>
                        </ul>
                    </div>
                    <div class="box">
                        <div class="h_title">&#8250; Group</div>
                        <ul>
                            <li class="b1"><a class="icon page" href="">Show all groups</a></li>
                            <li class="b2"><a class="icon add_page" href="">Add group</a></li>
                                                        <li class="b1"><a class="icon photo" href="">Add new gallery</a></li>
                                                        <li class="b2"><a class="icon category" href="">Categories</a></li>
                        </ul>
                    </div>
                    <div class="box">
                        <div class="h_title">&#8250; Users</div>
                        <ul>
                            <li class="b1"><a class="icon users" href="">Show all users</a></li>
                            <li class="b2"><a class="icon add_user" href="">Add new user</a></li>
                            <li class="b1"><a class="icon block_users" href="">Lock users</a></li>
                        </ul>
                    </div>
                    <div class="box">
                        <div class="h_title">&#8250; Slideshow</div>
                        <ul>
                            <li class="b1"><a class="icon page" href="<?php echo site_url('slideshow/listslide'); ?>">Show all slideshow</a></li>
                            <li class="b2"><a class="icon add_page" href="<?php echo site_url('slideshow/addnew'); ?>">Add new slideshow</a></li>
                            <li class="b1"><a class="icon page" href="<?php echo site_url('slideshow/category/listcat'); ?>">Show category</a></li>
                            <li class="b2"><a class="icon add_page" href="<?php echo site_url('slideshow/category/addnew'); ?>">Add new category</a></li>
                        </ul>
                    </div>

                    <div class="box">
                        <div class="h_title">&#8250; Tearelated</div>
                        <ul>
                            <li class="b1"><a class="icon page" href="<?php echo site_url('tearelated/listtea'); ?>">Show all tearelated</a></li>
                            <li class="b2"><a class="icon add_page" href="<?php echo site_url('tearelated/addnewtea'); ?>">Add new Tearelated</a></li>
                        </ul>
                    </div>

                    <div class="box">
                        <div class="h_title">&#8250; Home Page</div>
                        <ul>
                            <li class="b1"><a class="icon page" href="<?php echo site_url('content/home/listhome'); ?>">Home Page</a></li>
                        </ul>
                    </div>
                    <div class="box">
                        <div class="h_title">&#8250; About</div>
                        <ul>
                            <li class="b1"><a class="icon page" href="<?php echo site_url('about/listabout'); ?>">About Page</a></li>	
                        </ul>
                    </div>
                    <div class="box">
                        <div class="h_title">&#8250; Contact</div>
                        <ul>
                            <li class="b1"><a class="icon page" href="<?php echo site_url('contact/listcontact'); ?>">Contact Page</a></li>		
                        </ul>
                    </div>
                                        <div class="box">
                                            <div class="h_title">&#8250; Settings</div>
                                            <ul>
                                                <li class="b1"><a class="icon config" href="">Site configuration</a></li>
                                                <li class="b2"><a class="icon contact" href="">Contact Form</a></li>
                                            </ul>
                                        </div>
                </div>-->
                <div id="main">
                    <!--                    <div class="half_w half_left">
                                            <div class="h_title">Visits statistics</div>
                                            <script src="js/highcharts_init.js"></script>
                                            <div id="container" style="min-width: 300px; height: 180px; margin: 0 auto"></div>
                                            <script src="js/highcharts.js"></script>
                                        </div>
                                        <div class="half_w half_right">
                                            <div class="h_title">Site statistics</div>
                                            <div class="stats">
                                                <div class="today">
                                                    <h3>Today</h3>
                                                    <p class="count">2 349</p>
                                                    <p class="type">Visits</p>
                                                    <p class="count">96</p>
                                                    <p class="type">Comments</p>
                                                    <p class="count">9</p>
                                                    <p class="type">Articles</p>
                                                </div>
                                                <div class="week">
                                                    <h3>Last week</h3>
                                                    <p class="count">12 931</p>
                                                    <p class="type">Visits</p>
                                                    <p class="count">521</p>
                                                    <p class="type">Comments</p>
                                                    <p class="count">38</p>
                                                    <p class="type">Articles</p>
                                                </div>
                                            </div>
                                        </div>-->

                    <div class="clear"></div>

                    <div class="full_w">
                        <div class="h_title"><?php echo $action; ?></div>
                        <?php $this->load->view($page); ?>
                    </div>

                    <!--                    <div class="full_w">
                                            <div class="h_title">Add new page - form elements</div>
                                            <form action="" method="post">
                                                <div class="element">
                                                    <label for="name">Page title <span class="red">(required)</span></label>
                                                    <input id="name" name="name" class="text err" />
                                                </div>
                                                <div class="element">
                                                    <label for="category">Category <span class="red">(required)</span></label>
                                                    <select name="category" class="err">
                                                        <option value="0">-- select category</option>
                                                        <option value="1">Category 1</option>
                                                        <option value="2">Category 4</option>
                                                        <option value="3">Category 3</option>
                                                    </select>
                                                </div>
                                                <div class="element">
                                                    <label for="comments">Comments</label>
                                                    <input type="radio" name="comments" value="on" checked="checked" /> Enabled <input type="radio" name="comments" value="off" /> Disabled
                                                </div>
                                                <div class="element">
                                                    <label for="attach">Attachments</label>
                                                    <input type="file" name="attach" />
                                                </div>
                                                <div class="element">
                                                    <label for="content">Page content <span>(required)</span></label>
                                                    <textarea name="content" class="textarea" rows="10"></textarea>
                                                </div>
                                                <div class="entry">
                                                    <button type="submit">Preview</button> <button type="submit" class="add">Save page</button> <button class="cancel">Cancel</button>
                                                </div>
                                            </form>
                                        </div>-->

                    <!--                    <div class="full_w">
                                            <div class="h_title">Manage pages - table</div>
                                            <h2>Lorem ipsum dolor sit ame</h2>
                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>
                    
                                            <div class="entry">
                                                <div class="sep"></div>
                                            </div>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Author</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Category</th>
                                                        <th scope="col" style="width: 65px;">Modify</th>
                                                    </tr>
                                                </thead>
                    
                                                <tbody>
                                                    <tr>
                                                        <td class="align-center">2</td>
                                                        <td>Home</td>
                                                        <td>Paweł B.</td>
                                                        <td>22-03-2012</td>
                                                        <td>-</td>
                                                        <td>
                                                            <a href="#" class="table-icon edit" title="Edit"></a>
                                                            <a href="#" class="table-icon archive" title="Archive"></a>
                                                            <a href="#" class="table-icon delete" title="Delete"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-center">3</td>
                                                        <td>Our offer</td>
                                                        <td>Paweł B.</td>
                                                        <td>22-03-2012</td>
                                                        <td>-</td>
                                                        <td>
                                                            <a href="#" class="table-icon edit" title="Edit"></a>
                                                            <a href="#" class="table-icon archive" title="Archive"></a>
                                                            <a href="#" class="table-icon delete" title="Delete"></a>
                                                        </td>
                                                    </tr>
                    
                                                    <tr>
                                                        <td class="align-center">5</td>
                                                        <td>About</td>
                                                        <td>Admin</td>
                                                        <td>23-03-2012</td>
                                                        <td>-</td>
                                                        <td>
                                                            <a href="#" class="table-icon edit" title="Edit"></a>
                                                            <a href="#" class="table-icon archive" title="Archive"></a>
                                                            <a href="#" class="table-icon delete" title="Delete"></a>
                                                        </td>
                                                    </tr>
                    
                                                    <tr>
                                                        <td class="align-center">12</td>
                                                        <td>Contact</td>
                                                        <td>Admin</td>
                                                        <td>25-03-2012</td>
                                                        <td>-</td>
                                                        <td>
                                                            <a href="#" class="table-icon edit" title="Edit"></a>
                                                            <a href="#" class="table-icon archive" title="Archive"></a>
                                                            <a href="#" class="table-icon delete" title="Delete"></a>
                                                        </td>
                                                    </tr>						
                                                    <tr>
                                                        <td class="align-center">114</td>
                                                        <td>Portfolio</td>
                                                        <td>Paweł B.</td>
                                                        <td>22-03-2012</td>
                                                        <td>-</td>
                                                        <td>
                                                            <a href="#" class="table-icon edit" title="Edit"></a>
                                                            <a href="#" class="table-icon archive" title="Archive"></a>
                                                            <a href="#" class="table-icon delete" title="Delete"></a>
                                                        </td>
                                                    </tr>
                    
                                                    <tr>
                                                        <td class="align-center">116</td>
                                                        <td>Clients</td>
                                                        <td>Admin</td>
                                                        <td>23-03-2012</td>
                                                        <td>-</td>
                                                        <td>
                                                            <a href="#" class="table-icon edit" title="Edit"></a>
                                                            <a href="#" class="table-icon archive" title="Archive"></a>
                                                            <a href="#" class="table-icon delete" title="Delete"></a>
                                                        </td>
                                                    </tr>
                    
                                                    <tr>
                                                        <td class="align-center">131</td>
                                                        <td>Customer reviews</td>
                                                        <td>Admin</td>
                                                        <td>25-03-2012</td>
                                                        <td>-</td>
                                                        <td>
                                                            <a href="#" class="table-icon edit" title="Edit"></a>
                                                            <a href="#" class="table-icon archive" title="Archive"></a>
                                                            <a href="#" class="table-icon delete" title="Delete"></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="entry">
                                                <div class="pagination">
                                                    <span>« First</span>
                                                    <span class="active">1</span>
                                                    <a href="">2</a>
                                                    <a href="">3</a>
                                                    <a href="">4</a>
                                                    <span>...</span>
                                                    <a href="">23</a>
                                                    <a href="">24</a>
                                                    <a href="">Last »</a>
                                                </div>
                                                <div class="sep"></div>		
                                                <a class="button add" href="">Add new page</a> <a class="button" href="">Categories</a> 
                                            </div>
                                        </div>-->
                </div>
                <div class="clear"></div>
            </div>
            <div id="footer">
                <div class="left">
                    <!--<p>Power by: <a href="http://pichnil.com">Pichnil</a> | For: <a href="">qnbrandtea.com</a></p>-->
                </div>
                <div class="right">
                    <!--<p><a href="">Example link 1</a> | <a href="">Example link 2</a></p>-->
                </div>
            </div>
        </div>

    </body>
</html>
