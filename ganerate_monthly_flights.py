# Updated script with comments and instructions on how to adapt it for another month

# Import required libraries
import random
from datetime import datetime, timedelta

# Cities IDs
cities = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]

# Unavailable days in a month
unavailable_days = [5, 10, 15, 30]

def realistic_time(hour=None):
    """
    Generate a realistic time.
    If hour is provided, generate an arrival time based on it (1 to 5 hours later).
    Otherwise, generate a random departure time (between 6 AM and 10 PM).
    """
    if hour is not None:
        arrival_hour = hour + random.randint(1, 5)
        if arrival_hour >= 24:
            arrival_hour -= 24  # Adjust for next day arrival
        return f"{arrival_hour:02d}:{random.randint(0, 59):02d}:00"
    else:
        departure_hour = random.randint(6, 21)
        return f"{departure_hour:02d}:{random.randint(0, 59):02d}:00", departure_hour

def generate_flights_with_realistic_times(day):
    sql_statements = []
    for origin in cities:
        for destination in cities:
            if origin != destination:
                num_flights = random.randint(4, 7)
                for _ in range(num_flights):
                    departure_time, departure_hour = realistic_time()
                    arrival_time = realistic_time(departure_hour)
                    sql_statements.append(f"INSERT INTO flights (originCityID, destinationCityID, DepartureTime, ArrivalTime) VALUES ({origin}, {destination}, '{day} {departure_time}', '{day} {arrival_time}');\n")
    return sql_statements

# Generate flights for February 2024 with realistic times
start_date = datetime(2025, 1, 1)  # Start date of the month (YYYY, MM, DD)
end_date = datetime(2025, 1, 31)   # End date of the month (YYYY, MM, DD)

realistic_flights_sql_inserts = []
current_date = start_date
while current_date <= end_date:
    if current_date.day not in unavailable_days:
        realistic_flights_sql_inserts.extend(generate_flights_with_realistic_times(current_date.strftime('%Y-%m-%d')))
    current_date += timedelta(days=1)

# Save to a SQL file
sql_file_path = 'flights_february_realistic.sql'
with open(sql_file_path, 'w') as file:
    file.writelines(realistic_flights_sql_inserts)

# Instructions to update the script for another month:
# 1. Change `start_date` to the first day of the desired month, e.g., datetime(2024, 3, 1) for March 2024.
# 2. Change `end_date` to the last day of that month, e.g., datetime(2024, 3, 31) for March 2024.
# 3. Run the script again to generate the SQL statements for the new month.


