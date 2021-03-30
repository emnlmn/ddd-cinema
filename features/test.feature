Feature: A Customer reserves specific seats at a specific screening (for simplicity, assume there exists only one screening for the time beeing).

#  Scenario: Seat is available
#    Given a Screening with name "Main"
#    When The Customer reserve a Seat
#    Then The Seats reserved in Screening "Main" are 1

  Scenario: No previous reservation
    Given a Screening with name "Main"
      And a Customer named "Giovanni"
    When he reserve the Seat "A1" for Screening "Main"
    Then the Seat "A1" for Screening "Main" is reserved
