<?php
/* zKillboard
 * Copyright (C) 2012-2013 EVE-KILL Team and EVSCO.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class PhealLogger
{
	private $logID = null;

    public function start() {}

    public function stop() {}

    public function log($scope,$name,$opts) {
		Db::execute("insert into zz_api_log (scope, name, options) values (:scope, :name, :options)",
				array(":scope" => $scope, ":name" => $name, ":options" => json_encode($opts)));
	}

    public function errorLog($scope,$name,$opts,$message) {
		Db::execute("insert into zz_api_log (scope, name, options, errorCode) values (:scope, :name, :options, :error)",
				array(":scope" => $scope, ":name" => $name, ":options" => json_encode($opts), ":error" => substr($message, 0, 127)));
	}
}
