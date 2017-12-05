<div class="grid-container grid" id="grid<?php echo e($id); ?>">	
	<span></span>
	<?php if($advancedSearch && $advancedSearchOpened === true): ?>
		<div class="search advanced-search <?php echo e(isset($searchedValue) && $searchedValue<>'' ? 'searched' : ''); ?>">
			<form action="<?php echo e($url); ?>" method="get">
				<?php $__currentLoopData = $fieldsRequest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field=>$valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($field<>'search'): ?>
						<input type="hidden" name="<?php echo e($field); ?>" value="<?php echo e($valor); ?>">
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<fieldset>
					<legend><?php echo app('translator')->getFromJson('Simplegrid::grid.Advanced Search'); ?></legend>
					<?php echo $__env->make('Simplegrid::advancedSearch', ['fields'=>$advancedSearchFields], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<button class="btn-submit-advanced-search btn btn-default" type="submit" title="<?php echo app('translator')->getFromJson('Simplegrid::grid.Search'); ?>">
						<span class="glyphicon glyphicon-search"> </span> <?php echo app('translator')->getFromJson('Simplegrid::grid.Search'); ?>
					</button>
					<a href="<?php echo e($urlSimpleSearch); ?>" class="btn btn-default" title="<?php echo app('translator')->getFromJson('Simplegrid::grid.Simple Search'); ?>"><span class="glyphicon glyphicon-zoom-out"></span></a>
					<?php if($totalRows>0): ?>
						<span class="total-info pull-right">
							<?php echo e(trans_choice('Página :current_page  de :total_pages. Total de :total_rows Registros.', $totalRows, [
								'current_page'=>$currentPage, 
								'total_pages'=>$totalPages, 
								'total_rows'=>$totalRows
							])); ?>

						</span>
					<?php endif; ?>
				</fieldset>
			</form>
		</div>
	<?php elseif($allowSearch): ?>
		<div class="search simple-search <?php echo e(isset($searchedValue) && $searchedValue<>'' ? 'searched' : ''); ?>">		
			<form action="<?php echo e($url); ?>" method="get">			
				<?php $__currentLoopData = $fieldsRequest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field=>$valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($field<>'search' && !is_array($valor) && !is_object($valor)): ?>
						<input type="hidden" name="<?php echo e($field); ?>" value="<?php echo e($valor); ?>">
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		      	<input type="text" name="search" class="form-control input-search" placeholder="<?php echo app('translator')->getFromJson('Digite aqui'); ?>" value="<?php echo e($searchedValue); ?>">
		        <button class="btn-search btn btn-default" type="submit" title="<?php echo app('translator')->getFromJson('Simplegrid::grid.Search'); ?>"><span class="glyphicon glyphicon-search"></span></button>		      	
		      	<?php if(isset($searchedValue) && $searchedValue<>''): ?>				      		
			       	<button class="btn-clear-search btn btn-default" type="button" title="<?php echo app('translator')->getFromJson('Simplegrid::grid.Clear search'); ?>"><span class="glyphicon glyphicon-remove"></span></button>
		      	<?php endif; ?>
		      	<?php if($advancedSearch && $advancedSearchOpened === false): ?>
					<a href="<?php echo e($urlAdvancedSearch); ?>" class="btn-advanced-search btn btn-default" title="<?php echo app('translator')->getFromJson('Simplegrid::grid.Advanced Search'); ?>"><span class="glyphicon glyphicon-zoom-in"></span></a>
		      	<?php endif; ?>
		    </form>
			<?php if($totalRows>0): ?>
				<span class="total-info">
					<?php echo e(trans_choice('Página :current_page de :total_pages. Total de :total_rows registros.', $totalRows, [
						'current_page'=>$currentPage, 
						'total_pages'=>$totalPages, 
						'total_rows'=>$totalRows
					])); ?>

				</span>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	
	<div class="row">
		<div class="col-md-8">
			<?php if($bulkActions): ?>
			<div class="bulk-action">
				<select name="grid_bulk_action" class="grid_bulk_action" data-token="<?php echo e(csrf_token()); ?>" data-confirm-msg="<?php echo app('translator')->getFromJson('Simplegrid::grid.Do you really want to apply this action to the selected items?'); ?>" data-alert-msg="<?php echo app('translator')->getFromJson('Simplegrid::grid.Select at least one item to apply the action!'); ?>">
					<option value=""><?php echo app('translator')->getFromJson('Simplegrid::grid.Apply to selected'); ?></option>
					<?php $__currentLoopData = $bulkActions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($action['url']); ?>"><?php echo $action['title']; ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>		
			</div>
			<?php endif; ?>	
		</div>
		<div class="col-md-4">
			<div class="showing-rows-info pull-right">
				<span><?php echo app('translator')->getFromJson('Mostrar'); ?> </span>
				<select name="rows-per-page" data-url="<?php echo e($urlRowsPerPage); ?>">
					<?php $__currentLoopData = $rowsPerPage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo $nr; ?>" <?php echo $nr==$currentRowsPerPage ? 'selected' : ''; ?>><?php echo $nr; ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
				<span><?php echo app('translator')->getFromJson('registros por página'); ?></span>
			</div>
		</div>
	</div>	
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover table-condensed grid">
			<thead>
				<tr>
					<?php if($checkbox['show']): ?>
						<th>
							<input type="checkbox" class="select-all">
						</th>
					<?php endif; ?>					
					<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
						<?php if($v['show']): ?>
						<th class="<?php echo $k.' '.str_replace('.', ' ', $v['alias']); ?>">
							<div class="arrows">
								<a href="<?php echo e($urlOrder); ?>&order=<?php echo $k; ?>&direction=asc" title="<?php echo app('translator')->getFromJson('Simplegrid::grid.Order ascending'); ?>" class="arrow-up"></a>
								<a href="<?php echo e($urlOrder); ?>&order=<?php echo $k; ?>&direction=desc" title="<?php echo app('translator')->getFromJson('Simplegrid::grid.Order descending'); ?>" class="arrow-down"></a>
							</div>
							<span><?php echo e($v['label']); ?></span>
						</th>	
						<?php endif; ?>				
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php if(isset($actions)): ?>
						<th class="actions"><?php echo app('translator')->getFromJson('Simplegrid::grid.Actions'); ?></th>
					<?php endif; ?>
				</tr>
			</thead>			
			<tbody>
				<?php if(isset($rows) && count($rows)>0): ?>
					<?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>			
						<tr>
							<?php if($checkbox['show']): ?>
								<td>
									<input class="grid-checkbox" type="checkbox" name="grid_checkbox_<?php echo $checkbox['field']; ?>" value="<?php echo $row[$checkbox['field']]; ?>"/>
								</td>
							<?php endif; ?>
							<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
								<?php if($v['show']): ?>															
								<td class="field <?php echo str_replace('.', ' ', $v['alias']); ?>">									
									<?php echo $row[$v['alias_after_query_executed']]; ?>

								</td>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php if(isset($actions)): ?>
								<td class="actions">
									<?php $__currentLoopData = $row['gridActions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
										<?php if($action['method']=='GET'): ?>								
											<a href="<?php echo $action['url']; ?>" title="<?php echo e($action['title']); ?>" class="btn btn-xs action btn-default" target="<?php echo e($action['target']); ?>">
												<?php if(isset($action['icone'])): ?>
													<span class="<?php echo e($action['icone']); ?>"></span>
												<?php endif; ?>
												<?php if($action['onlyIcon']===false): ?>
													<?php echo e($action['title']); ?>

												<?php endif; ?>
											</a>
										<?php elseif($action['method']=='BUTTON'): ?>
											<button 
											 type="button" title="<?php echo e($action['title']); ?>" 
											 class="btn btn-xs action btn-default" 
											 data-csrf="<?php echo e(csrf_token()); ?>"
											 <?php $__currentLoopData = $action['attrs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											 	<?php echo $attr; ?>="<?php echo $value; ?>"
											 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											>
												<?php if(isset($action['icone'])): ?>
													<span class="<?php echo e($action['icone']); ?>"></span>
												<?php endif; ?>
												<?php if($action['onlyIcon']===false): ?>
													<?php echo e($action['title']); ?>

												<?php endif; ?>
											</button>
										<?php else: ?>
											<form action="<?php echo $action['url']; ?>" method="POST" <?php echo ($action['confirm']!==false ? 'onsubmit="if(!confirm(\''.addslashes(htmlentities($action['confirm'])).'\')){event.preventDefault; return false;}; "' : '' );; ?> >
												<?php echo e(csrf_field()); ?>

												<input type="hidden" name="_method" value="<?php echo $action['method']; ?>">
												<button type="submit" title="<?php echo e($action['title']); ?>" class=" btn btn-xs action btn-default">
													<?php if(isset($action['icone'])): ?>
														<span class="<?php echo e($action['icone']); ?>"></span>
													<?php endif; ?>
													<?php if($action['onlyIcon']===false): ?>
														<?php echo e($action['title']); ?>

													<?php endif; ?>
												</button>
											</form>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</td>
							<?php endif; ?>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
					<tr>
						<td colspan="<?php echo isset($actions) ? count($fields)+($checkbox['show'] ? 1 : 0)+1 : count($fields)+($checkbox['show'] ? 1 : 0); ?>" class="no-results-found">
							<span><?php echo app('translator')->getFromJson('Simplegrid::grid.No results found.'); ?></span>
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	<?php if(isset($rows) && count($rows)>0): ?>
	<div class="row">
		<div class="col-md-<?php echo $totalPages>1 ? '9' : '12'; ?>">	
			<?php if($allowExport): ?>
			<div class="input-group">				
				<select name="export" class="form-control">
					<option value=""><?php echo app('translator')->getFromJson('Selecione opção para exportar'); ?></option>
					<option value="xls">XLS</option>
					<option value="csv">CSV</option>
				</select>
				<a href="#" data-href="<?php echo e($urlExport); ?>" target="_blank" class="input-group-addon btn-export" title="<?php echo app('translator')->getFromJson('Simplegrid::grid.Export'); ?>" data-alert-msg="<?php echo app('translator')->getFromJson('Simplegrid::grid.Select a format for export!'); ?>">
					<span class="glyphicon glyphicon-download"></span> <?php echo app('translator')->getFromJson('Exportar'); ?>
				</a>
			</div>		
			<?php endif; ?>
		</div>
		<div class="col-md-3">
			<?php if($totalPages>1): ?>
				<div class="nav-pagination">
		            <div class="input-group">
						<a href="<?php echo $urlPreviousPage; ?>" class="direction input-group-addon" title="<?php echo app('translator')->getFromJson('Simplegrid::grid.Previous Page'); ?>">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
		                <select class="form-control select-page" data-url="<?php echo $urlPagination; ?>">
		                	<?php for($i=1; $i<=$totalPages;$i++): ?>
			                    <option value="<?php echo $i; ?>" <?php echo e($i==$currentPage ? 'selected' : ''); ?> ><?php echo app('translator')->getFromJson('Simplegrid::grid.Page'); ?> <?php echo $i; ?></option>
			                <?php endfor; ?>
		                </select>
						<a href="<?php echo $urlNextPage; ?>" class="direction input-group-addon" title="<?php echo app('translator')->getFromJson('Simplegrid::grid.Next Page'); ?>">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>	                
		            </div>
		        </div>
			<?php endif; ?>	
		</div>
	</div>
	<?php endif; ?>
</div>