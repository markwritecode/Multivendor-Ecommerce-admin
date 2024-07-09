<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Verify\V2\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class AccessTokenList extends ListResource {
    /**
     * Construct the AccessTokenList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid Verify Service Sid.
     */
    public function __construct(Version $version, string $serviceSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, ];

        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/AccessTokens';
    }

    /**
     * Create the AccessTokenInstance
     *
     * @param string $identity Unique external identifier of the Entity
     * @param string $factorType The Type of this Factor
     * @param array|Options $options Optional Arguments
     * @return AccessTokenInstance Created AccessTokenInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $identity, string $factorType, array $options = []): AccessTokenInstance {
        $options = new Values($options);

        $data = Values::of([
            'Identity' => $identity,
            'FactorType' => $factorType,
            'FactorFriendlyName' => $options['factorFriendlyName'],
            'Ttl' => $options['ttl'],
        ]);

        $payload = $this->version->create('POST', $this->uri, [], $data);

        return new AccessTokenInstance($this->version, $payload, $this->solution['serviceSid']);
    }

    /**
     * Constructs a AccessTokenContext
     *
     * @param string $sid A string that uniquely identifies this Access Token.
     */
    public function getContext(string $sid): AccessTokenContext {
        return new AccessTokenContext($this->version, $this->solution['serviceSid'], $sid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Verify.V2.AccessTokenList]';
    }
}