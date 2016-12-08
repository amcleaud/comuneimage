<?php

namespace CUI\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CUIUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
