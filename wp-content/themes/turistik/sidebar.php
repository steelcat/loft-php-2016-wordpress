<?php
$context = [];
$context['sidebar'] = Timber::get_widgets('sidebar-main');
Timber::render('sidebar.twig', $context);
