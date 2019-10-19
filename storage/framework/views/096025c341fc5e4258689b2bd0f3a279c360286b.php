<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-body">
                <form action="<?php echo e(route('buffer_postings.index')); ?>" method="GET">
                    <div class="row" style="margin:20px">
                        <div class="col-md-3">
                            <input type="text" name="search" />
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="date" />
                        </div>
                        <div class="col-md-3">
                            <select name="group">
                                <option value="">All Group</option>
                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($group->name); ?>"><?php echo e($group->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="send" />
                        </div> 
                    </div>
                </form>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Group Name</th>
                            <th scope="col">Group Type</th>
                            <th scope="col">Acount Name</th>
                            <th scope="col">Post Text</th>
                            <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $buffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buffer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <th scope="row"><?php echo e($buffer->groupInfo['name']); ?></th>
                            <th scope="row"><?php echo e($buffer->groupInfo['type']); ?></th>
                            <th scope="row">
                                <div style="position:relative; height:100px; width:100px;">
                                    <img src="<?php echo e($buffer->accountInfo['avatar']); ?>" style="border-radius:50%; height:100px; width:100px"  />
                                    <div style="position:absolute; height:30px;width:30px; display: flex;
                                    align-items: center;
                                    justify-content: center; top:5px; right:5px; border:2px solid #fff; border-radius:50%; background-color:blue;color:#fff">
                                        <i class="fa fa-<?php echo e($buffer->accountInfo['type']); ?>" aria-hidden="true"></i>
                                        
                                    </div>
                                </div>
                            </th>
                            <td><?php echo e($buffer->post_text); ?></td>
                            <td><?php echo e(date('l jS \of F Y h:i A', strtotime($buffer->sent_at))); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>