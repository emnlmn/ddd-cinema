Feature: A Customer reserves specific seats at a specific screening (for simplicity, assume there exists only one screening for the time beeing).

  Scenario: Seat is available
    Given a Customer
    And A Screening
    When The Customer reserve a Seat
    Then The Seat is reserved