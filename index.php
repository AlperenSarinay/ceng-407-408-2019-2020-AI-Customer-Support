<?php include "header.php";?>
    <div class="search-area-wrapper">
        <div class="search-area container">
            <h3 class="search-header">Have a Question?</h3>
            <p class="search-tag-line">If you have any question you can ask below or enter what you are looking!</p>
            <form id="search-form" class="search-form clearfix" method="get" action="#" autocomplete="off">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search this blog">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <div id="search-error-container"></div>
            </form>
        </div>
    </div>
    <div class="page-container">
        <div class="container">
            <div class="row">
                <div class="span8 page-content">
                    <div class="row separator">
                        <div class="span8 page-content">

                            <!-- Basic Home Page Template -->
                            <div class="row separator">
                                <section class="span4 articles-list">
                                    <h3>Featured Articles</h3>
                    <?php
                        $limit = 5;
                        $query = "SELECT * FROM questions";
                        $s = $conn->prepare($query);
                        $s->execute();
                        $total_results = $s->rowCount();
                        $total_pages = ceil($total_results/$limit);
                        if (!isset($_GET['page'])) {
                            $page = 1;
                        } else{
                            $page = $_GET['page'];
                        }
                        $starting_limit = ($page-1)*$limit;
                        $show = "SELECT * FROM questions ORDER BY q_id DESC LIMIT $starting_limit, $limit";
                        $r = $conn->prepare($show);
                        $r->execute();

                        while($res = $r->fetch(PDO::FETCH_ASSOC)) :
                            $q_author = $res['q_author'];
                            $q_title = $res['q_title'];
                            $q_id = $res['q_id'];
                            $origin_q_date = $res['q_date'];
                            $newDate = date("d m Y", strtotime($origin_q_date));
                            $user = $conn->query("SELECT user_id, username, q_author FROM users,questions WHERE user_id='$q_author'",PDO::FETCH_ASSOC)->fetch();
                    ?>
                                    <ul class="articles">
                                            <li class="article-entry standard">
                                                <h4> <a href='<?php echo "single.php?post=$q_id"; ?>' class="d-block text-gray-dark"><?php echo $q_title; ?></a></h4>
                                                <span class="article-meta"><?php echo $newDate; ?> <a href="#" title="View all posts in Server &amp; Database"><?php echo $user['username']; ?></a></span>
                                                <span class="like-count">66</span>
                                            </li>
                                    </ul>
                        <?php endwhile; ?>
                                </section>

                                <section class="span4 articles-list">
                                    <h3>Popular Articles</h3>
                                    <ul class="articles">
                                        <li class="article-entry standard">
                                            <h4><a href="single.html">Integrating WordPress with Your Website</a></h4>
                                            <span class="article-meta">25 Feb, 2013 in <a href="#" title="View all posts in Server &amp; Database">Server &amp; Database</a></span>
                                            <span class="like-count">66</span>
                                    </ul>
                                </section>
                            </div>
                            <?php  for ($page=1; $page <= $total_pages ; $page++):?>
                            <a href='<?php echo "?page=$page"; ?>' class="links">
                                <?php echo $page; ?>
                            </a>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
                <?php include "sidebar.php";?>
            </div>
        </div>
    </div>
    <?php include "footer.php";?>