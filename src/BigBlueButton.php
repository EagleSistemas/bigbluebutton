<?php namespace EagleSistemas\BigBlueButton;

use BigBlueButton\BigBlueButton as BigBlue;
use BigBlueButton\Parameters\CreateMeetingParameters;
use BigBlueButton\Parameters\EndMeetingParameters;
use BigBlueButton\Parameters\GetMeetingInfoParameters;
use BigBlueButton\Parameters\IsMeetingRunningParameters;
use BigBlueButton\Parameters\JoinMeetingParameters;

/**
 * Class BigBlueButton
 * @package EagleSistemas\BigBlueButton
 */
class BigBlueButton extends BigBlue
{

    /**
     * @param $arrayParams
     * @return CreateMeetingParameters
     *
     * [
     *      'meetingName' => 'Reunião de teste',# A name for the meeting.
     *      'meetingId' => '99999',             # A meeting ID that can be used to identify this meeting
     *                                            by the 3rd-party application.
     *      'attendeePassword' => 'ap',         # Set to 'ap' and use 'ap' to join = no user pass required.
     *      'moderatorPassword' => 'mp',        # Set to 'mp' and use 'mp' to join = no user pass required.
     *      'autoStartRecording' =>  true,      # Automatically starts recording when first user joins.
     *      'dialNumber' => '',                 # The main number to call into. Optional.
     *      'voiceBridge' => 54321,             # 5 digit PIN to join voice conference.  Required.
     *      'webVoice' => '',                   # Alphanumeric to join voice. Optional.
     *      'logoutUrl' => '',                  # Default in bigbluebutton.properties. Optional.
     *      'maxParticipants' => -1,            # Optional. -1 = unlimitted. Not supported in BBB. [number]
     *      'record' => false,                  # New. true will tell BBB to record the meeting.
     *      'duration' => 0,                    # Default = 0 which means no set duration in minutes. [number]
     *      'welcomeMessage' => '',             # '' use default. Change to customize.
     * ];
     * Mais informações: http://docs.bigbluebutton.org/dev/api.html#create
     */
    public function createMeetingParameters($arrayParams)
    {
        $meetingParams = new CreateMeetingParameters($arrayParams['meetingId'], $arrayParams['meetingName']);
        $meetingParams->setAttendeePassword($arrayParams['attendeePassword']);
        $meetingParams->setModeratorPassword($arrayParams['moderatorPassword']);
        $meetingParams->setAutoStartRecording($arrayParams['autoStartRecording']);
        $meetingParams->setDialNumber($arrayParams['dialNumber']);
        $meetingParams->setVoiceBridge($arrayParams['meetingId']);
        $meetingParams->setWebVoice($arrayParams['voiceBridge']);
        $meetingParams->setLogoutUrl($arrayParams['logoutUrl']);
        $meetingParams->setMaxParticipants($arrayParams['maxParticipants']);
        $meetingParams->setRecord($arrayParams['record']);
        $meetingParams->setDuration($arrayParams['duration']);
        $meetingParams->setWelcomeMessage($arrayParams['welcomeMessage']);

        return $meetingParams;
    }

    /**
     * @param $arrayParams
     * @return JoinMeetingParameters
     * [
     *      'meetingId'
     *      'userName'
     *      'password'
     * ]
     */
    public function getJoinMeetingParameters($arrayParams)
    {
        $joinParams = new JoinMeetingParameters(
            $arrayParams['meetingId'],
            $arrayParams['userName'],
            $arrayParams['password']
        );
        return $joinParams;
    }

    /**
     * @param $meetingId
     * @param $pwd
     * @return GetMeetingInfoParameters
     */
    public function createMeetingInfoParameters($meetingId, $pwd)
    {
        return new GetMeetingInfoParameters($meetingId, $pwd);
    }

    /**
     * @param $meetingId
     * @param $pwd
     * @return EndMeetingParameters
     */
    public function createEndMeetingParameters($meetingId, $pwd)
    {
        return new EndMeetingParameters($meetingId, $pwd);
    }

    /**
     * @param $meetingId
     * @return IsMeetingRunningParameters
     */
    public function createIsMeetingRunningParameters($meetingId)
    {
        return new IsMeetingRunningParameters($meetingId);
    }

    /**
     * @param $meetingId
     * @param $userName
     * @param $userPwd
     * @return JoinMeetingParameters
     */
    public function createJoinMeetingParameters($meetingId, $userName, $userPwd)
    {
        return new JoinMeetingParameters($meetingId, $userName, $userPwd);
    }
}
