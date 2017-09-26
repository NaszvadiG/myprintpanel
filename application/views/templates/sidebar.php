<div class="be-left-sidebar">
	<div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle"><?= $webpage_title; ?></a>
		<div class="left-sidebar-spacer">
			<div class="left-sidebar-scroll">
				<div class="left-sidebar-content">
					<ul class="sidebar-elements">
						<li class="divider">Menu</li>
						
						<li>
							<a href="<?php echo base_url(); ?>"><i class="icon mdi icon mdi-view-dashboard"></i> Dashboard</a>
						</li>
						<li>
							<a href="<?php echo base_url('clients'); ?>"><i class="icon mdi icon mdi-accounts-list"></i> Clients</a>
						</li>
						<li>
							<a href="<?php echo base_url('quotes'); ?>"><i class="icon mdi icon mdi-format-list-numbered"></i> Quotes</a>
						</li>
						<li>
							<a href="<?php echo base_url('orders'); ?>"><i class="icon mdi icon mdi-assignment"></i> Orders</a>
						</li>
						<li>
							<a href="<?php echo base_url('team'); ?>"><i class="icon mdi icon mdi-accounts"></i> Team</a>
						</li>
						<li<?php if(base_url(uri_string())==base_url('projects')) echo ' class="active"'; ?>>
							<a href="<?php echo base_url('projects'); ?>"><i class="icon mdi icon mdi-cloud-circle"></i> Projects</a>
						</li>
						<li class="parent">
							<a href="#"><i class="icon mdi icon mdi-settings"></i><span>Settings</span></a>
							<ul class="sub-menu">
								<li<?php if(base_url(uri_string())==base_url('settings/general')) echo ' class="active"'; ?>>
									<a href="<?= base_url('settings/general'); ?>"><i class="icon mdi icon mdi-accounts"></i> General</a>
								</li>
								<li<?php if(base_url(uri_string())==base_url('settings/integrations')) echo ' class="active"'; ?>>
									<a href="<?= base_url('settings/integrations'); ?>"><i class="icon mdi icon mdi-accounts"></i> Integrations</a>
								</li>
							</ul>
                  </li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>