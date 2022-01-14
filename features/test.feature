Feature: A Customer reserves specific seats at a specific screening (for simplicity, assume there exists only one screening for the time beeing).

  Scenario: No previous reservation
    Given a Screening with name "Main"
      And a Customer named "Giovanni"
    When he reserve the Seat "A1" for Screening "Main"
    Then the Seat "A1" for Screening "Main" is reserved

  Scenario: Giovanni has a Reservation
    Given i am "Giovanni"
    And a Reservation on Seat "A1" for Screening "Main"
    When he ask for his reservation
    Then he see the reservation for Seat "A1" for screening "Main"