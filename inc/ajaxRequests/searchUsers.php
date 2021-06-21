<?php
include '../../config.php';
use Database\Db;
if(isset($_SESSION['permission'])){
    if(isset($_GET['term'])){
        $term=DB::correctTermFormat($_GET['term'],'simple');
        $users=Db::simpleSearch(USER_TABLE_NAME,"FName LIKE '%$term%' OR LName LIKE '%$term%' OR phone LIKE '%$term%'","id");
    }
?>

    <div class="table-responsive">
        <?php if($users): ?>
            <table class="table table-striped table-sm text-nowrap align-middle">
                <thead>
                    <tr>
                    <th>نام و نام خانوادگی</th>
                    <th>موبایل</th>
                    <th>ایمیل</th>
                    <th>تاریخ عضویت</th>
                    <th>عملیات</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($users as $user):
                        //CREATE USER OBJECT
                        $userObj=new User($user['id']);
                    ?>
                        <tr>
                        <td><?php echo $userObj->getFirstName()." ".$userObj->getLastName(); ?></td>
                        <td><?php echo $userObj->getPhone(); ?></td>
                        <td><?php echo $userObj->getEmail(); ?></td>
                        <td><?php $timestampDate=convertTimeStamp($userObj->getCreatedAt())['date'];
                                echo timestampToJalaliDate($timestampDate);
                        ?></td>
                        <td>
                            <div class="d-flex flex-row">
                            <a href="?rm_user=<?php echo $userObj->getId(); ?>" class="btn btn-outline-danger">حذف از پایگاه داده</a>
                            </div>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else:?>
            <p>کاربری وجود ندارد</p>
        <?php endif; ?>
    </div>
<?php } ?>