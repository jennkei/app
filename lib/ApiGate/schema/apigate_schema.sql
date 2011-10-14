
-- Creates table for API Key information.  This includes information about the app itself, contact info related to the app,
-- and any rate-limiting rules.
--
-- DROP TABLE IF EXISTS apiGate_keys;
CREATE TABLE apiGate_keys (
	user_id INT(11) NOT NULL, -- foreign key to apiGate_users.id (which may be the id of whatever external system you are using for users)
	apiKey VARCHAR(255) NOT NULL, -- the actual API key. If generated by API Gate (as opposed to being imported from a legacy system) this will be a somewhat random hex string.
	
	email TINYTEXT NOT NULL, -- required so that someone can be contacted in emergencies (their app has an obvious bug, has gone over the rate-limit, etc.)
	
	

);

-- Creates table for users (includes profile information, etc.  This can be tied directly
-- to the user id of another system if you just want to grant API keys to existing users.
DROP TABLE IF EXISTS apiGate_users (
	id INT(11) NOT NULL AUTOINCREMENT, -- If you are using a separate system for the auth (and just trying API Gate to those accounts, then force-set this id.
	
	
	
	PRIMARY KEY(id),
);

-- TODO: STATS
