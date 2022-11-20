import sys
import task
import unittest
from io import StringIO

class TestClass(unittest.TestCase):
    def assertIO(self, input, output):
        stdout, stdin = sys.stdout, sys.stdin
        sys.stdout, sys.stdin = StringIO(), StringIO(input)
        task.solver()
        sys.stdout.seek(0)
        out = sys.stdout.read()[:-1]
        sys.stdout, sys.stdin = stdout, stdin
        self.assertEqual(out, output)

    def test_入力例_1(self):
        input = """2"""
        output = """14"""
        self.assertIO(input, output)

    def test_入力例_2(self):
        input = """10"""
        output = """1110"""
        self.assertIO(input, output)

if __name__ == "__main__":
    unittest.main()
